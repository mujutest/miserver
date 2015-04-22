<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MinticBundle\Entity\CallAditionalInfo;
use Acme\MinticBundle\Form\CallAditionalInfoType;

/**
 * CallAditionalInfo controller.
 *
 */
class CallAditionalInfoController extends Controller
{

    /**
     * Lists all CallAditionalInfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:CallAditionalInfo')->findAll();

        return $this->render('AcmeMinticBundle:CallAditionalInfo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CallAditionalInfo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CallAditionalInfo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('calladitionalinfo_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:CallAditionalInfo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CallAditionalInfo entity.
     *
     * @param CallAditionalInfo $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CallAditionalInfo $entity)
    {
        $form = $this->createForm(new CallAditionalInfoType(), $entity, array(
            'action' => $this->generateUrl('calladitionalinfo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CallAditionalInfo entity.
     *
     */
    public function newAction()
    {
        $entity = new CallAditionalInfo();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:CallAditionalInfo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CallAditionalInfo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CallAditionalInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CallAditionalInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:CallAditionalInfo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CallAditionalInfo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CallAditionalInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CallAditionalInfo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:CallAditionalInfo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CallAditionalInfo entity.
    *
    * @param CallAditionalInfo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CallAditionalInfo $entity)
    {
        $form = $this->createForm(new CallAditionalInfoType(), $entity, array(
            'action' => $this->generateUrl('calladitionalinfo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CallAditionalInfo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CallAditionalInfo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CallAditionalInfo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('calladitionalinfo_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:CallAditionalInfo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CallAditionalInfo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:CallAditionalInfo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CallAditionalInfo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('calladitionalinfo'));
    }

    /**
     * Creates a form to delete a CallAditionalInfo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('calladitionalinfo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
