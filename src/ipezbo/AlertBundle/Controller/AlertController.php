<?php

namespace ipezbo\AlertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\AlertBundle\Entity\Alert;

class AlertController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboAlertBundle:Alert');

        $alerts = $repository->findAll();

        return $this->render('ipezboAlertBundle:Alert:index.html.twig', array(
                    'alerts' => $alerts));
    }
    
    
        public function deleteAction(Alert $alert)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($alert);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'L\'alerte a bien été supprimée');


        return $this->redirect($this->generateUrl('ipezbo_alert_homepage'));
    }

}
