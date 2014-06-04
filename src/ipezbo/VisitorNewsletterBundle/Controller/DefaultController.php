<?php

namespace ipezbo\VisitorNewsletterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboVisitorNewsletterBundle:Default:index.html.twig', array('name' => $name));
    }
}
