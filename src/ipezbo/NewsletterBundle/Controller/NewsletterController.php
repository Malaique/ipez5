<?php

namespace ipezbo\NewsletterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsletterController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ipezboNewsletterBundle:Newsletter:index.html.twig', array('name' => $name));
    }
}
