<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;

use websites\ManagementBundle\Entity\dbs;
use websites\ManagementBundle\Form\dbsType;

/**
 * Databases controller.
 *
 */
class dbsController extends Controller
{

    /**
     * Lists all dbs entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('websitesManagementBundle:dbs')->findAll();

        return $this->render('websitesManagementBundle:dbs:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new dbs entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new dbs();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('databases_show', array('id' => $entity->getId())));
        }

        return $this->render('websitesManagementBundle:dbs:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a dbs entity.
     *
     * @param dbs $entity The entity
     *
     * @return FormInterface The form
     */
    private function createCreateForm(dbs $entity)
    {
        $form = $this->createForm(dbsType::class, $entity, array(
            'action' => $this->generateUrl('databases_create'),
            'method' => 'POST',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new dbs entity.
     *
     */
    public function newAction($idWebsite)
    {
        $entity = new dbs();
        $form   = $this->createCreateForm($entity);

        $query = $this->getDoctrine()->getManager()->getRepository('websitesManagementBundle:Website')
        ->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $entity->setIdWebsite($idWebsite);

        return $this->render('websitesManagementBundle:dbs:new.html.twig', array(
            'idWebsite' => $idWebsite,
            'entity' => $entity,
            'websitesList' => $websitesList,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Databases entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:dbs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Databases entity.');
        }
        $website = $em->getRepository('websitesManagementBundle:Website')->find($entity->getIdWebsite());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:dbs:show.html.twig', array(
            'website'     => $website,
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dbs entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:dbs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find dbs entity.');
        }
        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:dbs:edit.html.twig', array(
            'entity'      => $entity,
            'websitesList'=> $websitesList,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a dbs entity.
    *
    * @param dbs $entity The entity
    *
    * @return FormInterface The form
    */
    private function createEditForm(dbs $entity)
    {
        $form = $this->createForm(dbsType::class, $entity, array(
            'action' => $this->generateUrl('databases_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing dbs entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:dbs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find dbs entity.');
        }

        $editForm = $this->createEditForm($entity);

        if ($request->isMethod('POST')) {
            $editForm->submit($request->request->get($editForm->getName()));

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('databases_edit', array('id' => $id)));
    }
    /**
     * Deletes a dbs entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('websitesManagementBundle:dbs')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find dbs entity.');
        }
        $urlBack = $this->generateUrl('website_show', array('id' => $entity->getIdWebsite()));
        $em->remove($entity);
        $em->flush();

        return $this->redirect($urlBack);
    }

    /**
     * Creates a form to delete a dbs entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return FormInterface The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('databases_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
