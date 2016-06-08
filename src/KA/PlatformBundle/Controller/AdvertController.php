<?php

namespace KA\PlatformBundle\Controller;

use KA\PlatformBundle\Entity\Question;
use KA\PlatformBundle\Form\QuestionType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{

	public function indexAction()
	{
		return $this->render('KAPlatformBundle:Advert:index.html.twig');
	}
	
	public function kinesieAction()
	{
		return $this->render('KAPlatformBundle:Advert:kinesie.html.twig');
	}
	
	public function massageAction()
	{
		return $this->render('KAPlatformBundle:Advert:massage.html.twig');
	}

	public function osteopathieAction()
	{
		return $this->render('KAPlatformBundle:Advert:osteopathie.html.twig');
	}
	
	public function acupunctureAction()
	{
		return $this->render('KAPlatformBundle:Advert:acupuncture.html.twig');
	}
	
	public function vestibulaireAction()
	{
		return $this->render('KAPlatformBundle:Advert:vestibulaire.html.twig');
	}
	
	public function ecoledudosAction()
	{
		return $this->render('KAPlatformBundle:Advert:ecoledudos.html.twig');
	}	

	// public function equipeAction()
	// {
		// return $this->render('KAPlatformBundle:Advert:equipe.html.twig');
	// }
	
	public function contactAction(Request $request)
	{
		$question = new Question();
		
		$form = $this->createForm(new QuestionType(), $question);
		
		$request = $this->getRequest();
		
		if ( $request->getMethod() === 'POST') {
			
			$form->bind($request);
			
			if ($form->isValid()) {
				// Enregistrement du message dans la base de donnée
				// $entityManager = $this->getDoctrine()->getManager();
				// $entityManager->persist($question);
				// $entityManager->flush();
				
				// Envoi d'un mail avec le message contenu dans le formulaire
				$message = \Swift_Message::newInstance()
					->setSubject($form['subject']->getData())
					->setFrom($form['email']->getData())
					->setTo($this->container->getParameter('ka_platform.emails.contact_mail'))
					->setBody(
						$this->renderView(
						'KAPlatformBundle:Advert:contactEmail.txt.twig',
						array('question' => $question)
					),
					'text/html'
				);
	
				$mailer = $this->get('mailer')->send($message);
				$request->getSession()->getFlashBag()->add('notice', 'Votre question a été soumise !');
				return $this->redirect($this->generateUrl('ka_platform_contact'));
			}
		}
		return $this->render('KAPlatformBundle:Advert:contact.html.twig', array('form' => $form->createView(),));
	}
}