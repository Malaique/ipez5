<?php

namespace ipezbo\GeneralSettingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\GeneralSettingBundle\Entity\GeneralSetting;
use ipezbo\GeneralSettingBundle\Form\GeneralSettingType;

class GeneralSettingController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboGeneralSettingBundle:GeneralSetting');

        $generalSettings = $repository->findAll();

        return $this->render('ipezboGeneralSettingBundle:GeneralSetting:index.html.twig', array(
                    'generalSettings' => $generalSettings));
    }

    public function addAction() {

        $generalSetting = new GeneralSetting();

        $form = $this->createForm(new GeneralSettingType, $generalSetting);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($generalSetting);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le paramètre a été ajouté');
                return $this->redirect($this->generateUrl('ipezbo_general_setting_homepage'));
            }
        }
        return $this->render('ipezboGeneralSettingBundle:GeneralSetting:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(GeneralSetting $generalSetting) {
        $form = $this->createForm(new GeneralSettingType, $generalSetting);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le paramètre a bien été modifié');
                return $this->redirect($this->generateUrl('ipezbo_general_setting_homepage'));
            }
        }
        return $this->render('ipezboGeneralSettingBundle:GeneralSetting:edit.html.twig', array(
                    'form' => $form->createView(),
                    'generalSetting' => $generalSetting
        ));
    }

    public function deleteAction(GeneralSetting $generalSetting) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($generalSetting);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Le paramètre a bien été supprimé');


        return $this->redirect($this->generateUrl('ipezbo_general_setting_homepage'));
    }

}
