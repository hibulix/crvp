<?php

namespace KA\UserBundle\DataFixtures\ORM;

// use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use KA\UserBundle\Entity\User;

class LoadUser extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}
	
	public function load(ObjectManager $manager)
	{
		$listNames = array('admin','Olivier', 'Daniel', 'kine1', 'user2');
		$cpt = 0;
		
		foreach ($listNames as $name) {
			// Création d'un utilisateur*
			$cpt++;
			
			$user = new User();
			$user->setUsername($name);
			$user->setUsernameCanonical($name);
			$mail = 'example'."$cpt".'@yahoo.fr';
			$user->setEmail($mail);
			$user->setEmailCanonical($mail);
			$user->setEnabled(1);
			// $user->setSalt(md5(uniqid()));
			$encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
			// $user->setPassword($name);
			$user->setPassword($encoder->encodePassword($name, $user->getSalt()));
			$user->setLocked(0);
			$user->setExpired(0);
			if ($name == 'admin') {
				$user->addRole('ROLE_ADMIN');
			}
			$user->addRole('ROLE_PRACTICIAN');
			$user->setCredentialsExpired(0);
			$user->setLastname($name);
			$user->setFirstname($name);
			$user->setRecordingdate(new \Datetime('NOW'));
			$user->setComments(',jyfuy');
			$user->setAdress('Adress'."$cpt");
			$user->setBusinessTelephone('0734355251');
			$user->setMobileTelephone('0654324524');
			
			$manager->persist($user);
			
			$this->addReference('practician_'."$name", $user);
			
		}
		$manager->flush();
	}
		
	public function getOrder()
	{
		return 1;
	}
}