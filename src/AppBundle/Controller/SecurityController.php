<?php
/**
 * Created by PhpStorm.
 * User: Queen
 * Date: 29-Jun-16
 * Time: 12:58 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;;
use \Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{

    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    public function logoutAction()
    {
        $session = $this->get('session');
        $session->clear();

        return $this->redirectToRoute('login');
    }

}