<?php

namespace ipezbo\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ipezboHomeBundle:Default:index.html.twig', array());
    }
}
