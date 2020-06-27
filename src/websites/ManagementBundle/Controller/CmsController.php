<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;

use websites\ManagementBundle\Entity\Cms;
use websites\ManagementBundle\Form\CmsType;

/**
 * Cms controller.
 *
 */
class CmsController extends Controller
{

    /**
     * Lists all Cms entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('websitesManagementBundle:Cms')->findAll();

        return $this->render('websitesManagementBundle:Cms:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Cms entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cms();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('cms_show', array('id' => $entity->getId())));
        }

        return $this->render('websitesManagementBundle:Cms:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cms entity.
     *
     * @param Cms $entity The entity
     *
     * @return FormInterface The form
     */
    private function createCreateForm(Cms $entity)
    {
        $form = $this->createForm(CmsType::class, $entity, array(
            'action' => $this->generateUrl('cms_create'),
            'method' => 'POST',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new Cms entity.
     *
     */
    public function newAction($idWebsite)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Cms();
        $form   = $this->createCreateForm($entity);
        $entity->setIdWebsite($idWebsite);

        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        return $this->render('websitesManagementBundle:Cms:new.html.twig', array(
            'idWebsite'=> $idWebsite,
            'websitesList' => $websitesList,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cms entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:Cms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cms entity.');
        }
        $website = $em->getRepository('websitesManagementBundle:Website')->find($entity->getIdWebsite());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:Cms:show.html.twig', array(
            'website'     => $website,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cms entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:Cms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cms entity.');
        }
        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:Cms:edit.html.twig', array(
            'entity'      => $entity,
            'websitesList'=>$websitesList,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cms entity.
    *
    * @param Cms $entity The entity
    *
    * @return FormInterface The form
    */
    private function createEditForm(Cms $entity)
    {
        $form = $this->createForm(CmsType::class, $entity, array(
            'action' => $this->generateUrl('cms_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing Cms entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:Cms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cms entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->bind($request->request->get($editForm->getName()));

        if ($editForm->isValid()) {
            $em->flush();

        } else {
            //To do
        }
        return $this->redirect($this->generateUrl('cms_edit', array('id' => $id)));
    }
    /**
     * Deletes a Cms entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('websitesManagementBundle:Cms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cms entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('cms'));
    }

    /**
     * Creates a form to delete a Cms entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return FormInterface The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cms_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
