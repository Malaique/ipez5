<?php

namespace ipezbo\GeneralSettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GeneralSettingController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboGeneralSettingBundle:GeneralSetting:index.html.twig', array('name' => $name));
    }
}
