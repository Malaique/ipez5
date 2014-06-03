<?php

namespace ipezbo\NewsletterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\NewsletterBundle\Entity\Newsletter;
use ipezbo\NewsletterBundle\Form\NewsletterType;

class NewsletterController extends Controller
{
    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboNewsletterBundle:Newsletter');

        $newsletters = $repository->findAll();

        return $this->render('ipezboNewsletterBundle:Newsletter:index.html.twig', array('newsletters' => $newsletters));
    }

    public function addAction() {

        $newsletter = new Newsletter();

        $form = $this->createForm(new NewsletterType, $newsletter);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($newsletter);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La newsletter a été ajoutée');
                return $this->redirect($this->generateUrl('ipezbo_newsletter_homepage'));
            }
        }
        return $this->render('ipezboNewsletterBundle:Newsletter:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Newsletter $newsletter) {
        $form = $this->createForm(new NewsletterType, $newsletter);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La newsletter a bien été modifiée');
                return $this->redirect($this->generateUrl('ipezbo_newsletter_homepage'));
            }
        }
        return $this->render('ipezboNewsletterBundle:Newsletter:edit.html.twig', array(
                    'form' => $form->createView()
        ));
    }
}
