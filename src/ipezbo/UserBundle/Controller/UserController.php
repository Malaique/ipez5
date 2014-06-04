<?php

namespace ipezbo\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\UserBundle\Entity\User;
use ipezbo\UserBundle\Form\UserType;
use ipezbo\UserBundle\Form\UserProfile;

class UserController extends Controller {

    public function usersListAction() {

        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();


        return $this->render('ipezboUserBundle::list.html.twig', array('users' => $users));
    }

    public function promoteAdminAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->addRole($username, 'ROLE_ADMIN');

        return $this->redirect($this->generateUrl('ipezbo_user_list'));
    }

    public function demoteAdminAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->removeRole($username, 'ROLE_ADMIN');

        return $this->redirect($this->generateUrl('ipezbo_user_list'));
    }

    public function activateUserAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->activate($username);

        return $this->redirect($this->generateUrl('ipezbo_user_list'));
    }

    public function desactivateUserAction($username) {

        $usermanip = $this->get('fos_user.util.user_manipulator');
        $usermanip->deactivate($username);

        return $this->redirect($this->generateUrl('ipezbo_user_list'));
    }

    public function editUserAction($id) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ipezboUserBundle:User')->find($id);

        $form = $this->createForm(new UserProfile('ipezboUserBundle:User'), $user);
        $request = $this->getRequest();
        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'L\'utilisateur a été modifié');
                return $this->redirect($this->generateUrl('ipezbo_user_list', array()));
            }
        }


        return $this->render('ipezboUserBundle::edit.html.twig', array(
                    'user' => $user,
                    'form' => $form->createView()
        ));
    }

    public function deleteAction($id) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('ipezboUserBundle:User')->find($id);
        $em->remove($user);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'L\'utilsiateur a bien été supprimé');


        return $this->redirect($this->generateUrl('ipezbo_user_list'));
    }

}
