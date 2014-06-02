<?php

namespace ipezbo\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboUserBundle:User:index.html.twig', array('name' => $name));
    }
}
