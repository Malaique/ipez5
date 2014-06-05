<?php

namespace ipezbo\VisitorNewsletterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VisitorNewsletterController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboVisitorNewsletterBundle:VisitorNewsletter');

        $visitorsNewsletter = $repository->findAll();

        return $this->render('ipezboVisitorNewsletterBundle:VisitorNewsletter:index.html.twig', array(
                    'visitorsNewsletter' => $visitorsNewsletter));
    }

}
