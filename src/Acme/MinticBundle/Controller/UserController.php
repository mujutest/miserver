<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\MinticBundle\Entity\User;
use Acme\MinticBundle\Entity\UserCall;
use Acme\MinticBundle\Entity\Token;
use Acme\MinticBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller {

    /**
     * Lists all User entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:User')->findAll();

        return $this->render('AcmeMinticBundle:User:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('users_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:User:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity) {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('users_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction() {
        $entity = new User();
        $form = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:User:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:User:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:User:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(User $entity) {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('users_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('users_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:User:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('users'));
    }

    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('users_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function tokenAction() {
//        $request = Request::createFromGlobals();
        $email;
        $password;
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);
            $email = $params['cc'];
            $password = ($params['code']);
        }

        $user = $this->getUserByCc($email);
        $response = new Response(json_encode($email . " " . $password));
        //  echo$user->getCc() . " " . $user->getCode() . " " . $password;
        //echo strcasecmp($user->getCode(), $password);
        if ($user && $user->getCode() == $password) {



            $Base64token = base64_encode($user->getId() . $user->getCc());
            $tokenResult;
            try {
                $tokenResult = $this->getTokenbyToken($Base64token);
            } catch (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e) {
                $tokenResult = new Token();
            }
            $tokenResult->setToken($Base64token);
            $tokenResult->setCc($email);
            $arrayDate = getdate();
            $tokenResult->setExpirationDate($arrayDate["year"] . '-' . $arrayDate["mon"] . '-' . ($arrayDate["mday"] + 1));
            $em = $this->getDoctrine()->getManager();
            $em->persist($tokenResult);
            $em->flush();
            $response = new Response(json_encode($tokenResult));
            $response->headers->set('Content-Type', 'application/json');
            $response->headers->set('X-SecToken', $tokenResult->getToken());
            return $response;
        } else {

            $error = new \Acme\MinticBundle\Entity\ErrorResponse();
            $error->setCode(409);
            $error->setDescription("El código o documento son incorrectos");
            $error->setTitle("Lo sentimos");
            $response = new Response(json_encode($error));
            $response->setStatusCode(409);
            $response->headers->set('Content-Type', 'application/json');
            return $response;
//            $tokenExep->setCode(401);
//            $tokenExep->setDescription("No está autorizado");
//            $tokenExep->setTitle("Sin token");
//
//            $response = new Response(json_encode($tokenExep));
//            $response->headers->set('Content-Type', 'application/json');
//           // return $response;
//           // $ex =$this->createNotFoundException($response);
//         
//            return $response;
        }
    }

    public function callsAction() {
        $token = $this->getTokenCurrentUser();

        // $userCalls = $this->getUserCallsByCC($token->getCc());

        if ($token instanceof \Acme\MinticBundle\Entity\ErrorResponse) {
            $response = new Response(json_encode($token));
            $response->setStatusCode($token->getCode());
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        } else {
            $arr = array();
            $coll = new \Acme\MinticBundle\Entity\Coll(1,"Talento digital");
            $coll1 = new \Acme\MinticBundle\Entity\Coll(2,"PSP/TSP");
            $arr[] = $coll;
             $arr[] = $coll1;
            
            /*$talento = new UserCall();
            $talento->setName("Talento digital");
            $talento->setEmail("mujuanp@gmail.com");
            $talento->setCallId("1");
            $talento->setCc($token->getCc());
            $info1 = array();
            $infoTalento = new \Acme\MinticBundle\Entity\Attribute();
            $infoTalento->setName("Programa académico");
            $infoTalento->setDataType("String");
            $infoTalento->setValue("Ingeniería de sistemas");
            $infoTalento1 = new \Acme\MinticBundle\Entity\Attribute();
            $infoTalento1->setName("Institución académica");
            $infoTalento1->setDataType("String");
            $infoTalento1->setValue("Politécnico Grancolombiano");
            $info1[] = $infoTalento;
            $info1[] = $infoTalento1;
            $talento->setInfo($info1);

            $psp = new UserCall();

            $psp->setName("PSP/TSP");
            $psp->setEmail("juan@mu.com");
            $psp->setCallId("2");
            $psp->setCc($token->getCc());
            $info2 = array();
            $infoPsp = new \Acme\MinticBundle\Entity\Attribute();
            $infoPsp->setName("Programa  de capacitación");
            $infoPsp->setDataType("String");
            $infoPsp->setValue("Administración en sistemas");
            $infoPsp1 = new \Acme\MinticBundle\Entity\Attribute();
            $infoPsp1->setName("Institución capacitadora");
            $infoPsp1->setDataType("String");
            $infoPsp1->setValue("Politécnico Grancolombiano");
            $info2[] = $infoPsp;
            $info2[] = $infoPsp1;
            $psp->setInfo($info2);

            $arr[] = $talento;
            $arr[] = $psp;
*/

            $response = new Response(json_encode($arr));
            $response->headers->set('Content-Type', 'application/json');
            return $response;
        }
    }

    public function infoAction() {
        $token = $this->getTokenCurrentUser();

        $user = $this->getUserByCC($token->getCc());

        $response = new Response(json_encode($user));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
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

    public function getUserCallsByCC($cc) {
        $user = $this->getDoctrine()
                ->getRepository('AcmeMinticBundle:UserCall')
                ->findByCc($cc);

        if (!$user) {
            $user = NULL;
//            throw $this->createNotFoundException(
//                    'Email not found' . $email
//            );
        }

        return $user;
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

    public function getTokenCurrentUser() {
        $request = Request::createFromGlobals();
        $token = $request->headers->get("X-SecToken");

        $fundToken = $this->getTokenbyToken($token);
        return $fundToken;
    }

}
