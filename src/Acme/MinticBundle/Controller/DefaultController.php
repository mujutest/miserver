<?php

namespace Acme\MinticBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeMinticBundle:Default:index.html.twig', array('name' => $name));
    }
}
