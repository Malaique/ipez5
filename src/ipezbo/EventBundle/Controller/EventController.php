<?php

namespace ipezbo\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\EventBundle\Entity\Event;
use ipezbo\EventBundle\Form\EventType;

class EventController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboEventBundle:Event');

        $events = $repository->findAll();

        return $this->render('ipezboEventBundle:Event:index.html.twig', array('events' => $events));
    }

    public function addAction() {

        $event = new Event();

        $form = $this->createForm(new EventType, $event);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($event);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'evenement a été ajouté');
                return $this->redirect($this->generateUrl('ipezbo_event_homepage'));
            }
        }
        return $this->render('ipezboEventBundle:Event:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Event $event) {
        $form = $this->createForm(new EventType, $event);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'evenement a bien été modifiée');
                return $this->redirect($this->generateUrl('ipezbo_event_homepage'));
            }
        }
        return $this->render('ipezboEventBundle:Event:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
