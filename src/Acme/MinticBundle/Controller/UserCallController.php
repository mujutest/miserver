<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MinticBundle\Entity\UserCall;
use Acme\MinticBundle\Form\UserCallType;

/**
 * UserCall controller.
 *
 */
class UserCallController extends Controller
{

    /**
     * Lists all UserCall entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:UserCall')->findAll();

        return $this->render('AcmeMinticBundle:UserCall:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new UserCall entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new UserCall();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usercall_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:UserCall:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a UserCall entity.
     *
     * @param UserCall $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(UserCall $entity)
    {
        $form = $this->createForm(new UserCallType(), $entity, array(
            'action' => $this->generateUrl('usercall_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new UserCall entity.
     *
     */
    public function newAction()
    {
        $entity = new UserCall();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:UserCall:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a UserCall entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:UserCall')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserCall entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:UserCall:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing UserCall entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:UserCall')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserCall entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:UserCall:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a UserCall entity.
    *
    * @param UserCall $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(UserCall $entity)
    {
        $form = $this->createForm(new UserCallType(), $entity, array(
            'action' => $this->generateUrl('usercall_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing UserCall entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:UserCall')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find UserCall entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usercall_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:UserCall:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a UserCall entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:UserCall')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find UserCall entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usercall'));
    }

    /**
     * Creates a form to delete a UserCall entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usercall_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
