<?php

namespace KA\PlatformBundle\DataFixtures\ORM;

// use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KA\PlatformBundle\Entity\Practician;

class LoadPractician extends AbstractFixture implements OrderedFixtureInterface
{	
	public function load(ObjectManager $manager)
	{
		// Liste des utilisateurs enregistrés dans la base
		$listNames = array('admin','Olivier', 'Daniel', 'kine1', 'user2');
		
		foreach ($listNames as $name) {
			$practician = new Practician();
			// On fait le lien entre un praticien et l'utilisateur dans la base
			$practician->setUser($this->getReference('practician_'."$name"));
			// On lui ajoute ces patients
			
			if ($name == 'admin') {
				$practician->addPatient($this->getReference('patient-1'));
				$practician->addPatient($this->getReference('patient-2'));
			}
			elseif ($name == 'Olivier') {
				$practician->addPatient($this->getReference('patient-3'));
				$practician->addPatient($this->getReference('patient-4'));
			}
			elseif ($name == 'Daniel') {
				$practician->addPatient($this->getReference('patient-5'));
				$practician->addPatient($this->getReference('patient-6'));
			}
			elseif ($name == 'kine1') {
				$practician->addPatient($this->getReference('patient-7'));
				$practician->addPatient($this->getReference('patient-8'));
			}
			else {
				$practician->addPatient($this->getReference('patient-9'));
				$practician->addPatient($this->getReference('patient-10'));
			}
			$manager->persist($practician);
		}
		$manager->flush();
	}
	
	public function getOrder()
	{
		return 3;
	}
}