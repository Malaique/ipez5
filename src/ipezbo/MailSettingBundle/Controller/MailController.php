<?php

namespace ipezbo\MailSettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MailController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboMailSettingBundle:Mail:index.html.twig', array('name' => $name));
    }
}
