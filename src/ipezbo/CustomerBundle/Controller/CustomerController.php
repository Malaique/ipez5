<?php

namespace ipezbo\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CustomerController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboCustomerBundle:Customer:index.html.twig', array('name' => $name));
    }
}
