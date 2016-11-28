<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
	public function loginAction(Request $request)
    {
    	$authenticationUtils = $this->get('security.authentication_utils');

    	return $this->render(
        'security/login.html.twig',
        array(
            'last_username' => $authenticationUtils->getlastUsername(),
            'error'         => $authenticationUtils->getLastAuthentificationError(),
        ));
    }
}