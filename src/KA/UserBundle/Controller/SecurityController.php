<?php

namespace KA\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
	/**
	* Modification du choix de la vue lors du rendu du formulaire de connexion
	* On surcharge la méthode renderLogin()
	* https://github.com/FriendsOfSymfony/FOSUserBundle/blob/master/Controller/SecurityController.php
	*/
	protected function renderLogin(array $data)
	{
		// Pour le formulaire de connexion, on utilise la vue "login"
		if ($this->container->get('request')->attributes->get('_route') == 'fos_user_security_login'){
			$view = 'login';
		} else {
			// sinon, il s'agit du formulaire de connexion intégré au menu, on utilise la vue "login_content"
			// car il ne faut pas hériter du layout !
			$view = 'login_content';
		}
		
		// $template = sprintf('FOSUserBundle:Security:login.html.twig');
		$template = sprintf('FOSUserBundle:Security:%s.html.twig', $view);
		return $this->container->get('templating')->renderResponse($template, $data);
	}
}
