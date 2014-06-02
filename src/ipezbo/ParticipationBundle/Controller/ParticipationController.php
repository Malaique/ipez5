<?php

namespace ipezbo\ParticipationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ParticipationController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboParticipationBundle:Participation:index.html.twig', array('name' => $name));
    }
}
