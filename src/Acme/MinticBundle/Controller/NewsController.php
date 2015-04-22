<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\MinticBundle\Entity\CallInfo;
use Acme\MinticBundle\Entity\News;
use Acme\MinticBundle\Form\NewsType;

/**
 * News controller.
 *
 */
class NewsController extends Controller {

    /**
     * Lists all News entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:News')->findAll();

        return $this->render('AcmeMinticBundle:News:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new News entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new News();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('news_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:News:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a News entity.
     *
     * @param News $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(News $entity) {
        $form = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('news_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new News entity.
     *
     */
    public function newAction() {
        $entity = new News();
        $form = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:News:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a News entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:News:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing News entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:News:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a News entity.
     *
     * @param News $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(News $entity) {
        $form = $this->createForm(new NewsType(), $entity, array(
            'action' => $this->generateUrl('news_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing News entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:News')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find News entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('news_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:News:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a News entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:News')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find News entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('news'));
    }

    /**
     * Creates a form to delete a News entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('news_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function infoAction() {
//        $request = Request::createFromGlobals();
//        $result = array();
//        $new = new News();
//        $call1 = $this->getCallById(1);
//        $news = array();
//        $news[] = "Hay un nuevo reglamento";
//        $news[] = "2000 nuevos cupos";
//
//        $new->setCallId($call1->getId());
//        $new->setName($call1->getName());
//        $new->setNews($news);
//
//        $result[] = $new;
//
//        $call2 = $this->getCallById(2);
//        $news2 = array();
//        $news2[] = "100 nuevos cupos";
//        $new2 = new News();
//        $new2->setCallId($call2->getId());
//        $new2->setName($call2->getName());
//        $new2->setNews($news2);
//        $result[] = $new2;
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($new2);
//        $em->persist($new);
//        $em->flush();
        $response = new Response(json_encode($this->getNews()));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function getCallById($id) {
        $call = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:CallInfo')
                ->find($id);

        if (!$call) {
            throw $this->createNotFoundException(
                    'No Call found for id ' . $id
            );
        }

        return $call;
    }

    public function getNews() {
        $call = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:News')
                ->findAll();

        if (!$call) {
            throw $this->createNotFoundException(
                    'No New found '
            );
        }

        return $call;
    }

}
