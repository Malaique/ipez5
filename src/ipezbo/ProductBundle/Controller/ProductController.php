<?php

namespace ipezbo\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboProductBundle:Product:index.html.twig', array('name' => $name));
    }
}
