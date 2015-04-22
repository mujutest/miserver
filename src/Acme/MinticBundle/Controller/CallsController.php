<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\MinticBundle\Entity\Calls;
use Acme\MinticBundle\Form\CallsType;

/**
 * Calls controller.
 *
 */
class CallsController extends Controller {

    /**
     * Lists all Calls entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:Calls')->findAll();

        return $this->render('AcmeMinticBundle:Calls:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Calls entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Calls();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('calls_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:Calls:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Calls entity.
     *
     * @param Calls $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Calls $entity) {
        $form = $this->createForm(new CallsType(), $entity, array(
            'action' => $this->generateUrl('calls_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Calls entity.
     *
     */
    public function newAction() {
        $entity = new Calls();
        $form = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:Calls:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Calls entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Calls')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Calls entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:Calls:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Calls entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Calls')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Calls entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:Calls:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Calls entity.
     *
     * @param Calls $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Calls $entity) {
        $form = $this->createForm(new CallsType(), $entity, array(
            'action' => $this->generateUrl('calls_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Calls entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Calls')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Calls entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('calls_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:Calls:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Calls entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:Calls')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Calls entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('calls'));
    }

    /**
     * Creates a form to delete a Calls entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('calls_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function regionsAction() {
//        $request = Request::createFromGlobals();
        $regions = array();
        $cities = array();
        $departments = array();
        $towns = array();
        $result = new \Acme\MinticBundle\Entity\Regions();

        $regions[] = "Andina";
        $regions[] = "Caribe";
        $regions[] = "Orinoquia";

        $cities[] = "Bogotá";
        $cities[] = "Cali";

        $departments[] = "Antioquia";
        $departments[] = "Caldas";

        $towns[] = "Cáceres";
        $towns[] = "Caucasia";
        $towns[] = "Zaragoza";

        $result->setTowns($towns);
        $result->setDepartments($departments);
        $result->setRegions($regions);
        $result->setCities($cities);
        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function infoAction() {
//        $request = Request::createFromGlobals();

        $result = new Calls();

        $result->setAviable($this->getCallInfosbyState("Aviable"));
//        $result->setNext($this->getCallInfosbyState("Next"));
        $result->setNationalInfo($this->getCallInfosbyState("NationalInfo"));

        $response = new Response(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function infoidAction($id_call) {
//        $request = Request::createFromGlobals();

        $token = $this->getTokenCurrentUser();


//        $call = $this->getCallById();
        //  $calls = $this->getCallAdditionalInfoByCC($token->getCc());

        /* foreach ($calls as $call) {
          if ($call->getId() == $id_call) {
          $result = $call;
          break;
          }
          }
         */
        if ($token instanceof \Acme\MinticBundle\Entity\ErrorResponse) {
            $response = new Response(json_encode($token));
            $response->setStatusCode($token->getCode());
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        } else {
            $user = $this->getUserByCC($token->getCc());
            $result = new \Acme\MinticBundle\Entity\CallAditionalInfo();
            $result->setCallId($id_call);
            $result->setCc($token->getCc());
            $result->setName($user->getName());
            $call = $this->getCallById($id_call);
            $result->setCallName($call->getName());
            $result->setLast_name($user->getLastName());
            if ($id_call == 1) {

                $result->setEmail("mujuanp@gmail.com");
                $result->setPhone(3103337770);
                $result->setPaid(4000000 * $id_call);
                $recommended = array();
                $recommended[] = "No olvides enviar el reporte de notas al correo talentodigital@gobiernoenlinea.gov.co";
                $recommended[] = "Recuerda que el promedio mínimo es de 3,4";
                $result->setRecomendations($recommended);

                $info0 = new \Acme\MinticBundle\Entity\Attribute();
                $info0->setName("Programa académico");
                $info0->setDataType("String");
                $info0->setValue("Ingeniería de sistemas");

                $info2 = new \Acme\MinticBundle\Entity\Attribute();
                $info2->setName("Institución académica");
                $info2->setDataType("String");
                $info2->setValue("Politécnico Grancolombiano");

                $info3 = new \Acme\MinticBundle\Entity\Attribute();
                $info3->setName("Semestres a condonar");
                $info3->setDataType("String");
                $info3->setValue("Seis");

                $info4 = new \Acme\MinticBundle\Entity\Attribute();
                $info4->setName("Semestres cursados");
                $info4->setDataType("String");
                $info4->setValue("Cuatro");


                $info = array();
                $info1 = new \Acme\MinticBundle\Entity\Attribute();
                $info1->setName("Promedio acumulado actual");
                $info1->setDataType("Float");
                $info1->setValue(3.6 + $id_call * 0.1);

                $info[] = $info2;
                $info[] = $info0;
                $info[] = $info3;
                $info[] = $info4;
                $info[] = $info1;

                $result->setInfo($info);
            } else {
                $result->setEmail("jpguerrerob@gmail.com");
                $result->setPhone(3103337770);
                $result->setPaid(3000000 * $id_call);
                $recommended = array();
                $recommended[] = "No olvides enviar el reporte de notas al correo talentodigital@gobiernoenlinea.gov.co";
                $recommended[] = "Recuerda que el promedio mínimo es de 3,4";
                $result->setRecomendations($recommended);

                $info = array();
                $info1 = new \Acme\MinticBundle\Entity\Attribute();
                $info1->setName("Programa de capacitación");
                $info1->setDataType("String");
                $info1->setValue("Administración en sistemas");

                $info2 = new \Acme\MinticBundle\Entity\Attribute();
                $info2->setName("Institución capacitadora");
                $info2->setDataType("String");
                $info2->setValue("Politécnico Grancolombiano");
                $info[] = $info1;
                $info[] = $info2;

                $result->setInfo($info);
            }


            /*    $em = $this->getDoctrine()->getManager();
              $em->persist($result);
              $em->flush(); */
//        $result->setAviable($this->getCallInfosbyState("Aviable"));
//        $result->setNext($this->getCallInfosbyState("Next"));
//        $result->setNationalInfo($this->getCallInfosbyState("NationalInfo"));

            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }

    public function getCallInfosbyState($state) {
        $token = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:CallInfo')
                ->findByState($state);
//= $repository->findAll();
        if (!$token) {
            throw $this->createNotFoundException(
                    'No callfindo found for state ' . $state
            );
        }

        return $token;
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

    public function getTokenbyToken($token) {
        $token = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:Token')
                ->findOneByToken($token);
//= $repository->findAll();
        if (!$token) {

            $tokenExep = new \Acme\MinticBundle\Entity\ErrorResponse();
            $tokenExep->setCode(401);
            $tokenExep->setDescription("Debes iniciar sesión primero");
            $tokenExep->setTitle("Lo sentimos");


            return $tokenExep;
        }

        return $token;
    }

    public function getUserByCC($cc) {
        $user = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:User')
                ->findOneByCc($cc);

        if (!$user) {
            $user = NULL;
//            throw $this->createNotFoundException(
//                    'Email not found' . $email
//            );
        }

        return $user;
    }

    public function getTokenCurrentUser() {
        $request = Request::createFromGlobals();
        $token = $request->headers->get("X-SecToken");

        $fundToken = $this->getTokenbyToken($token);
        return $fundToken;
    }

    public function getCallAdditionalInfoByCC($cc) {
        $user = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:CallAditionalInfo')
                ->findByCc($cc);

        if (!$user) {
            $user = NULL;
//            throw $this->createNotFoundException(
//                    'Email not found' . $email
//            );
        }

        return $user;
    }

}
