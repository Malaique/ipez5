<?php

namespace ipezbo\SliderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SliderController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboSliderBundle:Slider:index.html.twig', array('name' => $name));
    }
}
