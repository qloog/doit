<?php

namespace Doit\WebBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DoitWebBundle:Default:index.html.twig', array('name' => 111));
    }

    public function adminAction()
    {
        return new Response('Admin page!');
    }
}
