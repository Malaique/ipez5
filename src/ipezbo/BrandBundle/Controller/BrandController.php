<?php

namespace ipezbo\BrandBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\BrandBundle\Entity\Brand;
use ipezbo\BrandBundle\Form\BrandType;

class BrandController extends Controller
{

    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboBrandBundle:Brand');

        $brands = $repository->findAll();

        return $this->render('ipezboBrandBundle:Brand:index.html.twig', array(
                    'brands' => $brands));
    }

    public function addAction()
    {

        $brand = new Brand();

        $form = $this->createForm(new BrandType, $brand);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($brand);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La marque a été ajoutée');
                return $this->redirect($this->generateUrl('ipezbo_brand_homepage'));
            }
        }
        return $this->render('ipezboBrandBundle:Brand:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Brand $brand)
    {
        $form = $this->createForm(new BrandType, $brand);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La marque a bien été modifiée');
                return $this->redirect($this->generateUrl('ipezbo_brand_homepage'));
            }
        }
        return $this->render('ipezboBrandBundle:Brand:edit.html.twig', array(
                    'form' => $form->createView(),
                    'brand' => $brand
        ));
    }

    public function deleteAction(Brand $brand)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($brand);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'La marque a bien été supprimée');


        return $this->redirect($this->generateUrl('ipezbo_brand_homepage'));
    }

}
