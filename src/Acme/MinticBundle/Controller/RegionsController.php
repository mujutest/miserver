<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Acme\MinticBundle\Entity\Regions;
use Acme\MinticBundle\Form\RegionsType;

/**
 * Regions controller.
 *
 */
class RegionsController extends Controller
{

    /**
     * Lists all Regions entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:Regions')->findAll();

        return $this->render('AcmeMinticBundle:Regions:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Regions entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Regions();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regions_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:Regions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Regions entity.
     *
     * @param Regions $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Regions $entity)
    {
        $form = $this->createForm(new RegionsType(), $entity, array(
            'action' => $this->generateUrl('regions_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Regions entity.
     *
     */
    public function newAction()
    {
        $entity = new Regions();
        $form   = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:Regions:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Regions entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Regions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:Regions:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Regions entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Regions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regions entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:Regions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Regions entity.
    *
    * @param Regions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Regions $entity)
    {
        $form = $this->createForm(new RegionsType(), $entity, array(
            'action' => $this->generateUrl('regions_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Regions entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Regions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regions entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('regions_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:Regions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Regions entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:Regions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Regions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regions'));
    }

    /**
     * Creates a form to delete a Regions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('regions_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
