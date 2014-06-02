<?php

namespace ipezbo\BrandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BrandController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboBrandBundle:Brand:index.html.twig', array('name' => $name));
    }
}
