<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;

use websites\ManagementBundle\Entity\SocialAcc;
use websites\ManagementBundle\Form\SocialAccType;

/**
 * SocialAcc controller.
 *
 */
class SocialAccController extends Controller
{

    /**
     * Lists all SocialAcc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('websitesManagementBundle:SocialAcc')->findAll();

        return $this->render('websitesManagementBundle:SocialAcc:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new SocialAcc entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new SocialAcc();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('socialacc_show', array('id' => $entity->getId())));
        }

        return $this->render('websitesManagementBundle:SocialAcc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a SocialAcc entity.
     *
     * @param SocialAcc $entity The entity
     *
     * @return FormInterface The form
     */
    private function createCreateForm(SocialAcc $entity)
    {
        $form = $this->createForm(SocialAccType::class, $entity, array(
            'action' => $this->generateUrl('socialacc_create'),
            'method' => 'POST',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new SocialAcc entity.
     *
     */
    public function newAction($idWebsite)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new SocialAcc();
        $form   = $this->createCreateForm($entity);
        $entity->setIdWebsite($idWebsite);

        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        return $this->render('websitesManagementBundle:SocialAcc:new.html.twig', array(
            'websitesList' => $websitesList,
            'idWebsite' => $idWebsite,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SocialAcc entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:SocialAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialAcc entity.');
        }
        $website = $em->getRepository('websitesManagementBundle:Website')->find($entity->getIdWebsite());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:SocialAcc:show.html.twig', array(
            'website'     => $website,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SocialAcc entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:SocialAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialAcc entity.');
        }
        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:SocialAcc:edit.html.twig', array(
            'entity'      => $entity,
            'websitesList'=> $websitesList,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a SocialAcc entity.
    *
    * @param SocialAcc $entity The entity
    *
    * @return FormInterface The form
    */
    private function createEditForm(SocialAcc $entity)
    {
        $form = $this->createForm(SocialAccType::class, $entity, array(
            'action' => $this->generateUrl('socialacc_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing SocialAcc entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:SocialAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialAcc entity.');
        }

        $editForm = $this->createEditForm($entity);

        if ($request->isMethod('POST')) {
            $editForm->submit($request->request->get($editForm->getName()));

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('socialacc_edit', array('id' => $id)));
    }
    /**
     * Deletes a SocialAcc entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('websitesManagementBundle:SocialAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find SocialAcc entity.');
        }
        $urlBack = $this->generateUrl('website_show', array('id' => $entity->getIdWebsite()));
        $em->remove($entity);
        $em->flush();

        return $this->redirect($urlBack);
    }

    /**
     * Creates a form to delete a SocialAcc entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return FormInterface The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('socialacc_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
