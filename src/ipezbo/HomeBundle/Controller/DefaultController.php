<?php

namespace ipezbo\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {
        
        if ($this->getUser()) {
            return $this->render('ipezboHomeBundle:Default:index.html.twig', array());
        }

        return $this->redirect($this->generateUrl('fos_user_security_login'));
    }

}
