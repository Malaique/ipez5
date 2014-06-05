<?php

namespace ipezbo\VisitorNewsletterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\VisitorNewsletterBundle\Entity\VisitorNewsletter;

class VisitorNewsletterController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboVisitorNewsletterBundle:VisitorNewsletter');

        $visitorsNewsletter = $repository->findAll();

        return $this->render('ipezboVisitorNewsletterBundle:VisitorNewsletter:index.html.twig', array(
                    'visitorsNewsletter' => $visitorsNewsletter));
    }
    
    
            public function deleteAction(VisitorNewsletter $visitorNewsletter)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($visitorNewsletter);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'L\'alerte a bien été supprimée');


        return $this->redirect($this->generateUrl('ipezbo_visitor_newsletter_homepage'));
    }

}
