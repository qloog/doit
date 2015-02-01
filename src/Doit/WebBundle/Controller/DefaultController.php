<?php

namespace Doit\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('DoitWebBundle:Default:index.html.twig', array('name' => $name));
    }
}
