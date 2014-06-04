<?php

namespace ipezbo\AlertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\AlertBundle\Entity\Alert;
use ipezbo\AlertBundle\Form\AlertType;

class AlertController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboAlertBundle:Alert');

        $alerts = $repository->findAll();

        return $this->render('ipezboAlertBundle:Alert:index.html.twig', array(
                    'alerts' => $alerts));
    }

}
