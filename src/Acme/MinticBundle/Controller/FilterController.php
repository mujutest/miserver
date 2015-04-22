<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\MinticBundle\Entity\Filter;
use Acme\MinticBundle\Entity\Point;
use Acme\MinticBundle\Form\FilterType;

/**
 * Filter controller.
 *
 */
class FilterController extends Controller {

    /**
     * Lists all Filter entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeMinticBundle:Filter')->findAll();

        return $this->render('AcmeMinticBundle:Filter:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Filter entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Filter();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('filter_show', array('id' => $entity->getId())));
        }

        return $this->render('AcmeMinticBundle:Filter:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Filter entity.
     *
     * @param Filter $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Filter $entity) {
        $form = $this->createForm(new FilterType(), $entity, array(
            'action' => $this->generateUrl('filter_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Filter entity.
     *
     */
    public function newAction() {
        $entity = new Filter();
        $form = $this->createCreateForm($entity);

        return $this->render('AcmeMinticBundle:Filter:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Filter entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Filter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Filter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:Filter:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Filter entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Filter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Filter entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AcmeMinticBundle:Filter:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Filter entity.
     *
     * @param Filter $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Filter $entity) {
        $form = $this->createForm(new FilterType(), $entity, array(
            'action' => $this->generateUrl('filter_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Filter entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AcmeMinticBundle:Filter')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Filter entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('filter_edit', array('id' => $id)));
        }

        return $this->render('AcmeMinticBundle:Filter:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Filter entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AcmeMinticBundle:Filter')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Filter entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('filter'));
    }

    /**
     * Creates a form to delete a Filter entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('filter_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function infoAction() {
//        $request = Request::createFromGlobals();
        $params = array();
        $content = $this->get("request")->getContent();
        if (!empty($content)) {
            $params = json_decode($content, true);

            try {
                $region = $params['region'];
                $name = ($params['name']);
                $town = ($params['town']);
                $city = ($params['city']);
                $department = ($params['department']);
                $national = ($params['national']);
            } catch (Exception $e) {
                
            }


             $info = new \Acme\MinticBundle\Entity\Attribute();
            $count = new \Acme\MinticBundle\Entity\CountInformation();
            $money = 200000000;


            

          /*  $nacho = new \Acme\MinticBundle\Entity\Attribute();
            $nacho->setName("Universidad Nacional");
            $nacho->setDataType("String");
            $nacho->setValue("Universidad Nacional");

            $poli = new \Acme\MinticBundle\Entity\Attribute();
            $poli->setName("Politecnico Grancolombiano");
            $poli->setDataType("String");
            $poli->setValue("Politecnico Grancolombiano");

            $children2 = array();
            $children3 = array();

            $children2[] = $nacho;
            $children3[] = $poli;

            $child->setChildren($children2);
            $child2->setChildren($children3);
*/
          

            $points[] = new Point(6, -73.5);
            if ($national) {
                $count->setTotal(100000);
                $count->setEconomicStatus1(17000);
                $count->setEconomicStatus2(17000);
                $count->setEconomicStatus3(17000);
                $count->setEconomicStatus4(17000);
                $count->setEconomicStatus5(17000);
                $count->setEconomicStatus6(15000);
                $count->setFemale(60000);
                $count->setMale(40000);
                $count->setProfesional(30000);
                $count->setTech(70000);
                
                       $child = new \Acme\MinticBundle\Entity\Attribute();
            $child->setName("Publicas");
            $child->setDataType("Integer");
            $child->setValue(65000);


            $child2 = new \Acme\MinticBundle\Entity\Attribute();
            $child2->setName("Privadas");
            $child2->setDataType("Integer");
            $child2->setValue(35000);
                
                
                
            } else {
                $totalcount = 9000;

                $points = array();

                if ($region && $region == "Andina" || $town && $town == "Rionegro" || $city && $city == "Bogotá") {
                    $totalcount-=5000;
                    $money-=100000000;
                    $points[] = new Point(4.75, -75);
                } else
                if ($region && $region == "Caribe") {
                        $totalcount-=7800;
                    $money-=180000000;
                    $points[] = new Point(9.75, -72);
                } else
                if ($region && $region == "Orinoquia") {
                    $totalcount-=7200;
                    $money-=120000000;
                    //5 y -70.5
                    $points[] = new Point(5, -70.5);
                } else {
//                if ($region && $region == "Caribe" || $region && $region == "Orinoquia") 
                    $totalcount-= 7500;
                    $points[] = new Point(6, -73.5);
                }

                $count->setTotal($totalcount);
                $count->setEconomicStatus1((int)($totalcount-$totalcount * 0.81));
                $count->setEconomicStatus2((int)($totalcount-$totalcount * 0.81));
                $count->setEconomicStatus3((int)($totalcount-$totalcount * 0.5));
                $count->setEconomicStatus4((int)($totalcount-$totalcount * 0.96));
                $count->setEconomicStatus5((int)($totalcount-$totalcount * 0.96));
                $count->setEconomicStatus6((int)($totalcount-$totalcount * 0.96));
                $count->setFemale($totalcount * 0.6);
                $count->setMale($totalcount * 0.4);
                $count->setProfesional($totalcount * 0.3);
                $count->setTech($totalcount * 0.7);
                
   
            $info->setName("Instituciones");
            $info->setDataType("String");
            $info->setValue("Instituciones");
            $children = array();
            
            
            $child = new \Acme\MinticBundle\Entity\Attribute();
            $child->setName("Publicas");
            $child->setDataType("Integer");
            $child->setValue($totalcount*0.75);


            $child2 = new \Acme\MinticBundle\Entity\Attribute();
            $child2->setName("Privadas");
            $child2->setDataType("Integer");
            $child2->setValue($totalcount*0.25);
                
                
            }





//            if ($gender == "Femenino")
//                $totalcount-=500;
//            if ($gender == "Masculino")
//                $totalcount-=1000;
//
//            if ($grade == "Profesional")
//                $totalcount-=1000;
            if ($national) {
                $percentage=100;
            } else
                $percentage = $count->getTotal() / 90;

            $result = new Filter();
              $children[] = $child;
            $children[] = $child2;
            $info->setChildren($children);
            $result->setInfo($info);
            $result->setCount($count);
            $result->setMoney($money);
            $result->setPercentage($percentage);
            $result->setPoints($points);
            /**
             * "Andina",
              "Caribe",
              "Orinoquia"
             */
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($result);
//            $em->flush();
            $response = new Response(json_encode($result));
            $response->headers->set('Content-Type', 'application/json');
        }


//
//        $result->setAviable($this->getCallInfosbyState("Aviable"));
//        $result->setNext($this->getCallInfosbyState("Next"));
//        $result->setNationalInfo($this->getCallInfosbyState("NationalInfo"));


        return $response;
    }

}
