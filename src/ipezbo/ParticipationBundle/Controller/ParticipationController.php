<?php

namespace ipezbo\ParticipationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\EventBundle\Entity\Event;
use ipezbo\ParticipationBundle\Entity\Participation;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ParticipationController extends Controller {

    public function indexAction(Event $event) {


        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboParticipationBundle:Participation');

        $participations = $repository->getParticipationByEvent($event->getId());

        return $this->render('ipezboParticipationBundle:Participation:index.html.twig', array(
                    'participations' => $participations,
                    'event' => $event));
    }

    public function activateUserAction(Participation $participation, $event) {

        $participation->setRequestAccepted(1);
        $em = $this->getDoctrine()->getManager();
        $em->flush($participation);
        $this->get('session')->getFlashBag()->add('info', 'La marque a bien été modifiée');
        return $this->redirect($this->generateUrl('ipezbo_participation_homepage', array('id' => $event)));
    }

    public function desactivateUserAction(Participation $participation, $event) {

        $participation->setRequestAccepted(0);
        $em = $this->getDoctrine()->getManager();
        $em->flush($participation);
        $this->get('session')->getFlashBag()->add('info', 'La marque a bien été modifiée');
        return $this->redirect($this->generateUrl('ipezbo_participation_homepage', array('id' => $event)));
    }

    public function getListingParticipationEventAction(Event $event) {


        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboParticipationBundle:Participation');

        $participations = $repository->getAcceptedParticipationByEvent($event->getId());

        $request = $this->getRequest();

        if ($request->getMethod() == 'GET') {
            $handle = fopen('php://memory', 'r+');
            foreach ($participations as $participation) {
                fputcsv($handle, array(
                    'nom' => $participation['customer']['name'],
                    'prenom' => $participation['customer']['surname'],
                    'mail' => $participation['customer']['mail']));
            }


            rewind($handle);
            $content = stream_get_contents($handle);
            fclose($handle);

            return new \Symfony\Component\HttpFoundation\Response($content, 200, array(
                'Content-Type' => 'application/force-download',
                'Content-Disposition' => 'attachment; filename="export.csv"'
            ));
        }


        return $this->render('ipezboParticipationBundle:Participation:index.html.twig', array(
                    'participations' => $participations,
                    'event' => $event));
    }

}
