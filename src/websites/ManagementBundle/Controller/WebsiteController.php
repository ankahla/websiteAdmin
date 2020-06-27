<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Symfony\Component\Routing\Annotation\Route;
use websites\ManagementBundle\Entity\Website;
use websites\ManagementBundle\Form\WebsiteType;

/**
 * Website controller.
 *
 * @Route("/website")
 */
class WebsiteController extends Controller
{
    /**
     * Lists all Website entities.
     * @Route("/", name="website", methods={"GET"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('websitesManagementBundle:Website')->findAll();

/*        $ftpAccounts = $em->getRepository('websitesManagementBundle:ftpAccounts')->findAll();
        $databases = $em->getRepository('websitesManagementBundle:dbs')->findAll();
        $emailAccounts = $em->getRepository('websitesManagementBundle:emailAccounts')->findAll();
        $emailAccounts = $em->getRepository('websitesManagementBundle:emailAccounts')->findAll();*/

        return $this->render('websitesManagementBundle:Website:index.html.twig', ['entities' => $entities]);
    }
    /**
     * Creates a new Website entity.
     *
     * @Route("/", name="website_create", methods={"POST"})
     */
    public function createAction(Request $request)
    {
        $entity = new Website();
        $form = $this->createCreateForm($entity);
        $form->add('updDate', HiddenType::class, array('data' => new \DateTime()));
        $form->add('createdDate', HiddenType::class, array('data' => new \DateTime()));
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('website_show', array('id' => $entity->getId())));
        }

        return $this->render('websitesManagementBundle:Website:new.html.twigg', [
            'entity' => $entity,
            'form'   => $form->createView()
        ]);
    }

    /**
     * Creates a form to create a Website entity.
     *
     * @param Website $entity The entity
     *
     * @return FormInterface The form
     */
    private function createCreateForm(Website $entity)
    {
        $form = $this->createForm(WebsiteType::class, $entity, array(
            'action' => $this->generateUrl('website_create'),
            'method' => 'POST',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Website entity.
     *
     * @Route("/new", name="website_new", methods={"GET"})
     */
    public function newAction()
    {
        $entity = new Website();
        $form   = $this->createCreateForm($entity);

        return $this->render('websitesManagementBundle:Website:new.html.twig', [
            'entity' => $entity,
            'form'   => $form->createView()
        ]);
    }

    /**
     * Finds and displays a Website entity.
     *
     * @Route("/{id}", name="website_show", methods={"GET"})
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        // ftp accounts
        $ftpAccounts = $em->getRepository('websitesManagementBundle:FtpAccounts')->findByIdWebsite($id);
        // databases
        $dbs = $em->getRepository('websitesManagementBundle:dbs')->findByIdWebsite($id);
        // emails
        $emails = $em->getRepository('websitesManagementBundle:EmailAcc')->findByIdWebsite($id);
        // cms
        $cmsList = $em->getRepository('websitesManagementBundle:Cms')->findByIdWebsite($id);
        // socialAcc
        $socialAcc = $em->getRepository('websitesManagementBundle:SocialAcc')->findByIdWebsite($id);

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:Website:show.html.twig', [
            'entity'      => $entity,
            'ftpAccounts' => $ftpAccounts,
            'dbs' => $dbs,
            'emails' => $emails,
            'cmsList' => $cmsList,
            'socialAcc' => $socialAcc,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Displays a form to edit an existing Website entity.
     *
     * @Route("/{id}/edit", name="website_edit", methods={"GET"})
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('websitesManagementBundle:Website:edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
    * Creates a form to edit a Website entity.
    *
    * @param Website $entity The entity
    *
    * @return FormInterface The form
    */
    private function createEditForm(Website $entity)
    {
        $form = $this->createForm(WebsiteType::class, $entity, array(
            'action' => $this->generateUrl('website_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', SubmitType::class, array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Website entity.
     *
     * @Route("/{id}", name="website_update", methods={"PUT"})
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('websitesManagementBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->add('updDate', HiddenType::class, array('data' => new \DateTime()));
        $editForm->handleRequest($request);

        if ($request->isMethod('POST')) {
            $editForm->submit($request->request->get($editForm->getName()));

            if ($editForm->isSubmitted() && $editForm->isValid()) {
                $em->flush();

                return $this->redirect($this->generateUrl('website_edit', array('id' => $id)));
            }
        }

        return $this->render('websitesManagementBundle:Website:edit.html.twig', [
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }
    /**
     * Deletes a Website entity.
     *
     * @Route("/{id}", name="website_delete", methods={"DELETE"})
     */
    public function deleteAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('websitesManagementBundle:Website')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Website entity.');
        }

        $em->remove($entity);
        $em->flush();


        return $this->redirect($this->generateUrl('website'));
    }

    /**
     * Creates a form to delete a Website entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return FormInterface The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('website_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', SubmitType::class, array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
