<?php

namespace KA\PlatformBundle\Controller;

use KA\PlatformBundle\Entity\Practician;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PracticianController extends Controller
{
	public function intranetAction(Request $request)
	{
		// Récupération de la session
		$session = $request->getSession();
		
		
		// Récupération du service UserManager
		// $userManager = $this->get('fos_user.user_manager');
		// Pour charger un utilisateur
		// $user = $userManager->findUserBy(array('username' => 'dan121'));
		
		// On récupère le service
		$security = $this->get('security.context');
		
		// On récupère le token
		$token = $security->getToken();
		// Si la requête courante n'est pas derrière un pare-feu, $token est null
		// Sinon, on récupère l'utilisateur
		$user = $token->getUser();
		
		// Si l'utilisateur courant est anonyme, $user vaut « anon. »
		// Sinon, c'est une instance de notre entité User, on peut l'utiliser normalement
		$user->getUsername();
		
		return $this->render('KAPlatformBundle:Advert:intranet.html.twig');
	}
}