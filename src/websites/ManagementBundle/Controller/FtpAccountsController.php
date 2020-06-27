<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use websites\ManagementBundle\Entity\FtpAccounts;
use websites\ManagementBundle\Form\FtpAccountsType;

/**
 * FtpAccounts controller.
 *
 */
class FtpAccountsController extends Controller
{

    /**
     * Lists all FtpAccounts entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('websitesManagementBundle:FtpAccounts')->findAll();

        return $this->render('websitesManagementBundle:FtpAccounts:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new FtpAccounts entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new FtpAccounts();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ftpaccounts_show', array('id' => $entity->getId())));
        }

        return $this->render('websitesManagementBundle:FtpAccounts:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a FtpAccounts entity.
     *
     * @param FtpAccounts $entity The entity
     *
     * @return FormInterface The form
     */
    private function createCreateForm(FtpAccounts $entity)
    {
        $form = $this->createForm(FtpAccountsType::class, $entity, array(
            'action' => $this->generateUrl('ftpaccounts_create'),
            'method' => 'POST',
            'data' => $entity
        ));


        return $form;
    }

    /**
     * Displays a form to create a new FtpAccounts entity.
     *
     */
    public function newAction($idWebsite)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new FtpAccounts();

        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $form   = $this->createCreateForm($entity);

        return $this->render('websitesManagementBundle:FtpAccounts:new.html.twig', array(
            'idWebsite' => $idWebsite,
            'websitesList' => $websitesList,
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a FtpAccounts entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:FtpAccounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccounts entity.');
        }
        $website = $em->getRepository('websitesManagementBundle:Website')->find($entity->getIdWebsite());
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:FtpAccounts:show.html.twig', array(
            'entity'      => $entity,
            'website'     => $website,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing FtpAccounts entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:FtpAccounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccounts entity.');
        }
        $query = $em->getRepository('websitesManagementBundle:Website')->createQueryBuilder('w')
        ->select('w.id, w.domain')
        ->orderBy('w.domain', 'ASC')
        ->getQuery();
        $websitesList = $query->getArrayResult();

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:FtpAccounts:edit.html.twig', array(
            'entity'      => $entity,
            'websitesList' => $websitesList,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a FtpAccounts entity.
    *
    * @param FtpAccounts $entity The entity
    *
    * @return FormInterface The form
    */
    private function createEditForm(FtpAccounts $entity)
    {
        $form = $this->createForm(FtpAccountsType::class, $entity, array(
            'action' => $this->generateUrl('ftpaccounts_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit',  SubmitType::class, array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing FtpAccounts entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:FtpAccounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccounts entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
        } else {
            //$this->get('session')->getFlashBag()->set('type', 'message');
        }

        return $this->redirect($this->generateUrl('ftpaccounts_edit', array('id' => $id)));
    }
    /**
     * Deletes a FtpAccounts entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('websitesManagementBundle:FtpAccounts')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find FtpAccounts entity.');
        }
        $urlBack = $this->generateUrl('website_show', array('id' => $entity->getIdWebsite()));
        $em->remove($entity);
        $em->flush();


        return $this->redirect($urlBack);
    }

    /**
     * Creates a form to delete a FtpAccounts entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return FormInterface The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ftpaccounts_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
