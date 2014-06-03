<?php

namespace ipezbo\SliderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\SliderBundle\Entity\Slider;
use ipezbo\SliderBundle\Form\SliderType;

class SliderController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboSliderBundle:Slider');

        $sliders = $repository->findAll();

        return $this->render('ipezboSliderBundle:Slider:index.html.twig', array('sliders' => $sliders));
    }

    public function addAction() {

        $slider = new Slider();

        $form = $this->createForm(new SliderType(), $slider);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($slider);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le slider a été ajouté');
                return $this->redirect($this->generateUrl('ipezbo_slider_homepage'));
            }
        }
        return $this->render('ipezboSliderBundle:Slider:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Slider $slider) {
        $form = $this->createForm(new SliderType, $slider);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le slider a bien été modifié');
                return $this->redirect($this->generateUrl('ipezbo_slider_homepage'));
            }
        }
        return $this->render('ipezboSliderBundle:Slider:edit.html.twig', array(
                    'form' => $form->createView(),
                    'slider' => $slider
        ));
    }

}
