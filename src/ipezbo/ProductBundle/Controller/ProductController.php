<?php

namespace ipezbo\ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\ProductBundle\Entity\Product;
use ipezbo\ProductBundle\Form\ProductType;

class ProductController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboProductBundle:Product');

        $products = $repository->findAll();

        return $this->render('ipezboProductBundle:Product:index.html.twig', array('products' => $products));
    }

    public function addAction() {

        $product = new Product();

        $form = $this->createForm(new ProductType(), $product);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le produit a été ajouté');
                return $this->redirect($this->generateUrl('ipezbo_product_homepage'));
            }
        }
        return $this->render('ipezboProductBundle:Product:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function editAction(Product $product) {
        $form = $this->createForm(new ProductType, $product);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le produit a bien été modifié');
                return $this->redirect($this->generateUrl('ipezbo_product_homepage'));
            }
        }
        return $this->render('ipezboProductBundle:Product:edit.html.twig', array(
                    'form' => $form->createView(),
                    'product' => $product
        ));
    }
    
    
        public function deleteAction(Product $product)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($product);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Le produit a bien été supprimée');


        return $this->redirect($this->generateUrl('ipezbo_product_homepage'));
    }

}
