<?php

namespace ipezbo\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        return $this->render('ipezboUserBundle:User:index.html.twig');
    }
}
