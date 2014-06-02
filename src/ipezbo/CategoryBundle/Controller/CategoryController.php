<?php

namespace ipezbo\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategoryController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboCategoryBundle:Category:index.html.twig', array('name' => $name));
    }
}
