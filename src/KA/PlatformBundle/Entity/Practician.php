<?php

namespace KA\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use KA\UserBundle\Entity\User;

/**
 * Practician
 */
class Practician
{
    /**
     * @var integer
     */
    private $id;

	/**
	 * @ORM\OneToOne(targetEntity="KA\UserBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
	 */
	private $user;
	
	/**
	 * @ORM\ManyToMany(targetEntity="KA\PlatformBundle\Entity\Patient", cascade={"persist"}) 
	 */
	private $listofpatients;
	
	private $date;
	
	
	public function __construct()
	{
		$this->date = new \Datetime('NOW');
		$this->listofpatients = new ArrayCollection();
	}

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
	
	public function setUser(User $user = null)
	{
		$this->user = $user;
	}
	
	public function getUser()
	{
		return $this->user;
	}
	
	public function addPatient(Patient $patient)
	{
		$this->listofpatients[] = $patient;
		$patient->addPractician($this);
		return $this;
	}
	
	public function removePatient(Patient $patient)
	{
		$this->listofpatients->removeElement($patient);
	}
	
	public function getPatients()
	{
		return $this->listofpatients;
	}
	
	public function getName()
	{
		if (is_null($this->getUser())){
			return "";
		}
		return $this->getUser()->getLastname()." ".$this->getUser()->getFirstname();
	}
	
	public function __toString()
	{
		if (is_null($this->getUser())){
			return "" ;
		}
		return $this->getUser()->__toString();
	}
}
