<?php

namespace ipezbo\AlertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlertController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboAlertBundle:Alert:index.html.twig', array('name' => $name));
    }
}
