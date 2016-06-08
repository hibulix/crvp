<?php

namespace KA\PlatformBundle\DataFixtures\ORM;

// use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use KA\PlatformBundle\Entity\Patient;

class LoadPatient extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}
	
	public function load(ObjectManager $manager)
	{
		$names = array(
			'patient1',
			'patient2',
			'patient3',
			'patient4',
			'patient5',
			'patient6',
			'patient7',
			'patient8',
			'patient9',
			'patient10'
		);

		$rootdir= $this->container->getParameter('ka_platform.patient_folder');
		$cpt = 0;
		foreach ($names as $name) {
			$cpt++ ;
			$patient = new Patient();
			$patient->setName($name);
			$patient->setRootdir($rootdir);
			$manager->persist($patient);
			
			$this->addReference('patient-'."$cpt", $patient);
		}
		$manager->flush();
	}
	
	public function getOrder()
	{
		return 2;
	}
}