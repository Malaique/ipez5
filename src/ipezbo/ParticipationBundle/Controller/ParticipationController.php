<?php

namespace ipezbo\ParticipationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\EventBundle\Entity\Event;

class ParticipationController extends Controller {

    public function indexAction(Event $event) {


        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboParticipationBundle:Participation');

        $participations = $repository->getParticipationByEvent($event->getId());

        return $this->render('ipezboParticipationBundle:Participation:index.html.twig', array(
                    'participations' => $participations,
                    'event' => $event));
    }

}
