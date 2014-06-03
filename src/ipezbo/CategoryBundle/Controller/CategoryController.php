<?php

namespace ipezbo\CategoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\CategoryBundle\Entity\Category;
use ipezbo\CategoryBundle\Form\CategoryType;

class CategoryController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboCategoryBundle:Category');

        $categories = $repository->findAll();

        return $this->render('ipezboCategoryBundle:Category:index.html.twig', array('categories' => $categories));
    }

    public function addAction() {

        $category = new Category();

        $form = $this->createForm(new CategoryType, $category);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($category);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La catégorie a été ajoutée');
                return $this->redirect($this->generateUrl('ipezbo_category_homepage'));
            }
        }
        return $this->render('ipezboCategoryBundle:Category:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Category $category) {
        $form = $this->createForm(new CategoryType, $category);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'La catégorie a bien été modifiée');
                return $this->redirect($this->generateUrl('ipezbo_category_homepage'));
            }
        }
        return $this->render('ipezboCategoryBundle:Category:edit.html.twig', array(
                    'form' => $form->createView(),
                    'category' => $category
        ));
    }

}
