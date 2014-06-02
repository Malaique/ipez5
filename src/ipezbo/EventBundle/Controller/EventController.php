<?php

namespace ipezbo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboEventBundle:Event:index.html.twig', array('name' => $name));
    }
}
