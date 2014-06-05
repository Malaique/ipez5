<?php

namespace ipezbo\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ipezbo\CustomerBundle\Entity\Customer;
use ipezbo\CustomerBundle\Form\CustomerType;

class CustomerController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('ipezboCustomerBundle:Customer');

        $customers = $repository->findAll();

        return $this->render('ipezboCustomerBundle:Customer:index.html.twig', array(
                    'customers' => $customers));
    }

    public function addAction() {

        $customer = new Customer();

        $form = $this->createForm(new CustomerType, $customer);
        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($customer);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le client a été ajouté');
                return $this->redirect($this->generateUrl('ipezbo_customer_homepage'));
            }
        }
        return $this->render('ipezboCustomerBundle:Customer:add.html.twig', array(
                    'form' => $form->createView()
                        )
        );
    }

    public function deleteAction(Customer $customer) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($customer);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Le client a bien été supprimé');


        return $this->redirect($this->generateUrl('ipezbo_customer_homepage'));
    }

    public function watchAction(Customer $customer) {

        return $this->render('ipezboCustomerBundle:Customer:watch.html.twig', array(
                    'customer' => $customer
                        )
        );
    }

}
