<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MinticBundle\Entity\CallInfo;
use Acme\MinticBundle\Form\CallInfoType;

/**
 * CallInfo controller.
 *
 */
class CallInfoController extends Controller
{

    /**
     * Lists all CallInfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:CallInfo')->findAll();

        return $this->render('AcmeMinticBundle:CallInfo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CallInfo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CallInfo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('callinfo_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:CallInfo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CallInfo entity.
     *
     * @param CallInfo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CallInfo $entity)
    {
        $form = $this->createForm(new CallInfoType(), $entity, array(
            'action' => $this->generateUrl('callinfo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CallInfo entity.
     *
     */
    public function newAction()
    {
        $entity = new CallInfo();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:CallInfo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CallInfo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CallInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CallInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:CallInfo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CallInfo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CallInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CallInfo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:CallInfo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CallInfo entity.
    *
    * @param CallInfo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CallInfo $entity)
    {
        $form = $this->createForm(new CallInfoType(), $entity, array(
            'action' => $this->generateUrl('callinfo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CallInfo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CallInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CallInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('callinfo_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:CallInfo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CallInfo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:CallInfo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CallInfo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('callinfo'));
    }

    /**
     * Creates a form to delete a CallInfo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('callinfo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
