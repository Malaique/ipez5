<?php

namespace ipezbo\AlertBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\AlertBundle\Entity\Alert;
use ipezbo\AlertBundle\Form\AlertType;

class AlertController extends Controller {

    public function indexAction() {

        $alert = new Alert();

        $form = $this->createForm(new AlertType, $alert);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($alert);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'alert a été ajoutée');
                return $this->redirect($this->generateUrl('ipezbo_alert_homepage'));
            }
        }
        return $this->render('ipezboAlertBundle:Alert:index.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

}
