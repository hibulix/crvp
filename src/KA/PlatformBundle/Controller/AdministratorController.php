<?php

namespace KA\PlatformBundle\Controller;

use KA\PlatformBundle\Entity\Question;
use KA\PlatformBundle\Form\QuestionType;
use KA\PlatformBundle\Entity\Patient;
use KA\PlatformBundle\Entity\PatientType;
use KA\PlatformBundle\Entity\Practician;
use KA\PlatformBundle\Form\PracticianType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AdministratorController extends Controller
{
	
	public function adminAction()
	{
		return $this->render('KAPlatformBundle:Administrator:admin.html.twig');
	}
	
	public function displayallAction(Request $request)
	{
		if (!$this->get('security.context')->isGranted('ROLE_USER')) {
			throw new AccessDeniedHttpException('Accès limité');
		}
		$this->loadData();
		$repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('KAPlatformBundle:Practician')
		;
		
		$listPracticians = $repository->findAll();
		$entityManager = $this->getDoctrine()->getManager();
		// $practician = $entityManager->getRepository('KAPlatformBundle:Practician')->find(1);
		$form = $this->createForm(new PracticianType());
		
		return $this->render('KAPlatformBundle:Administrator:displayall.html.twig', array(
			'form' => $form->createView(),
		));
	}
	
	
	public function loadData()
	{
		$listPracticians = $this->viewAction();
		$entityManager = $this->getDoctrine()->getManager();
		foreach ($listPracticians as $practician ) 
		{
			$user = $entityManager->getRepository('KAUserBundle:User')->find($practician->getId());
			
			$practician->setUser($user);
			$entityManager->persist($practician);
			
			$patient1 = $entityManager->getRepository('KAPlatformBundle:Patient')->find(1);
			$patient2 = $entityManager->getRepository('KAPlatformBundle:Patient')->find(2);
			$patient3 = $entityManager->getRepository('KAPlatformBundle:Patient')->find(3);
			$patient4 = $entityManager->getRepository('KAPlatformBundle:Patient')->find(4);
			
			$practician->addPatient($patient1);
			$practician->addPatient($patient2);
			$practician->addPatient($patient3);
			$practician->addPatient($patient4);
	
			$entityManager->persist($practician);
		}
		$entityManager->flush();
	}
	
	public function viewAction()
	{
		$repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('KAPlatformBundle:Practician')
		;
		
		return $repository->myFindAll();
	}
	
	public function removePracticianAction(Request $request)
	{
		$repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('KAPlatformBundle:Practician')
		;
		
		$listPractician = $repository->myFindAll();
		
		return $request;
	}
	
	public function addPracticianAction()
	{
		
	}
	
	public function removePatientAction($idPatient)
	{
		// On récupère son médecin traitant
		$entityManager = $this->getDoctrine()->getManager();
		// $practician = $entityManager->getRepository('KAPlatformBundle:Practician')->find($idPractician);
		$patient = $entityManager->getRepository('KAPlatformBundle:Patient')->find('idPatient');
		
		if ($practician === null) {
			throw new NotFoundHttpException("Le médecin d'id ".$id." n'existe pas.");
		}
		if ($patient === null) {
			throw new NotFoundHttpException("Le patient d'id ".$id." n'existe pas.");
		}
		
		$listPractician = $patient->getPracticians();
		// TODO Vérifier que la fonction renvoie bien des objets practician
		foreach ($listPractician as $practician){
			$practician->removePatient($patient);
		}
		$entityManager->flush();
		
		// TODO Que devienne les données du Patient
		// On a pas fini, l'objet en lui-meme doit etre detruit
	}
		
	
	public function addPatientAction()
	{
		
	}
}