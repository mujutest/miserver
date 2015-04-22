<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MinticBundle\Entity\CountInformation;
use Acme\MinticBundle\Form\CountInformationType;

/**
 * CountInformation controller.
 *
 */
class CountInformationController extends Controller
{

    /**
     * Lists all CountInformation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:CountInformation')->findAll();

        return $this->render('AcmeMinticBundle:CountInformation:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new CountInformation entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CountInformation();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('countinformation_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:CountInformation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CountInformation entity.
     *
     * @param CountInformation $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CountInformation $entity)
    {
        $form = $this->createForm(new CountInformationType(), $entity, array(
            'action' => $this->generateUrl('countinformation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CountInformation entity.
     *
     */
    public function newAction()
    {
        $entity = new CountInformation();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:CountInformation:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CountInformation entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CountInformation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CountInformation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:CountInformation:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CountInformation entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CountInformation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CountInformation entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:CountInformation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CountInformation entity.
    *
    * @param CountInformation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CountInformation $entity)
    {
        $form = $this->createForm(new CountInformationType(), $entity, array(
            'action' => $this->generateUrl('countinformation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CountInformation entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:CountInformation')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CountInformation entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('countinformation_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:CountInformation:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CountInformation entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:CountInformation')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CountInformation entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('countinformation'));
    }

    /**
     * Creates a form to delete a CountInformation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('countinformation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
