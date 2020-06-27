<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;

use websites\ManagementBundle\Entity\EmailAcc;
use websites\ManagementBundle\Form\EmailAccType;

/**
 * EmailAcc controller.
 *
 */
class EmailAccController extends Controller
{

    /**
     * Lists all EmailAcc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('websitesManagementBundle:EmailAcc')->findAll();

        return $this->render('websitesManagementBundle:EmailAcc:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EmailAcc entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EmailAcc();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('emailacc_show', array('id' => $entity->getId())));
        }

        return $this->render('websitesManagementBundle:EmailAcc:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a EmailAcc entity.
     *
     * @param EmailAcc $entity The entity
     *
     * @return FormInterface The form
     */
    private function createCreateForm(EmailAcc $entity)
    {
        $form = $this->createForm(EmailAccType::class, $entity, array(
            'action' => $this->generateUrl('emailacc_create'),
            'method' => 'POST',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new EmailAcc entity.
     *
     */
    public function newAction($idWebsite)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new EmailAcc();
        $form   = $this->createCreateForm($entity);

        $entity->setIdWebsite($idWebsite);

        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        return $this->render('websitesManagementBundle:EmailAcc:new.html.twig', array(
            'idWebsite' => $idWebsite,
            'entity' => $entity,
            'websitesList' => $websitesList,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EmailAcc entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:EmailAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EmailAcc entity.');
        }
        $website = $em->getRepository('websitesManagementBundle:Website')->find($entity->getIdWebsite());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:EmailAcc:show.html.twig', array(
            'entity'      => $entity,
            'website'     => $website,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing EmailAcc entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:EmailAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EmailAcc entity.');
        }
        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:EmailAcc:edit.html.twig', array(
            'entity'      => $entity,
            'websitesList'=> $websitesList,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EmailAcc entity.
    *
    * @param EmailAcc $entity The entity
    *
     * @return FormInterface The form
    */
    private function createEditForm(EmailAcc $entity)
    {
        $form = $this->createForm(EmailAccType::class, $entity, array(
            'action' => $this->generateUrl('emailacc_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing EmailAcc entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:EmailAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EmailAcc entity.');
        }

        $editForm = $this->createEditForm($entity);

        if ($request->isMethod('POST')) {
            $editForm->submit($request->request->get($editForm->getName()));

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('emailacc_edit', array('id' => $id)));
    }
    /**
     * Deletes a EmailAcc entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('websitesManagementBundle:EmailAcc')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EmailAcc entity.');
        }
        $urlBack = $this->generateUrl('website_show', array('id' => $entity->getIdWebsite()));
        $em->remove($entity);
        $em->flush();

        return $this->redirect($urlBack);
    }

    /**
     * Creates a form to delete a EmailAcc entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return FormInterface The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emailacc_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
