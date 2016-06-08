<?php

namespace KA\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Patient
 */
class Patient
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rootDir;

    /**
     * @var \DateTime
     */
    private $date;
	
    /**
     * @var string
     */
    private $rootdir;

	/**
	 * @ORM\ManyToMany(targetEntity="KA\PlatformBundle\Entity\Practician", mappedBy="listofpatients") 
	 */
	private $listofpractician;

	public function __construct()
	{
		$this->date = new \Datetime('NOW');
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

    /**
     * Set name
     *
     * @param string $name
     * @return Patient
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set rootdir
     *
     * @param string $rootdir
     * @return Patient
     */
    public function setRootdir($rootdir)
    {
        $this->rootdir = $rootdir;

        return $this;
    }

    /**
     * Get rootdir
     *
     * @return string 
     */
    public function getRootdir()
    {
        return $this->rootdir;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Patient
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
	
	public function addPractician(Practician $practician)
	{
		$this->listofpracticians[] = $practician;
		return $this;
	}
	
	public function removePractician(Practician $practician)
	{
		$this->listofpatients->removeElement($practician);
	}
	
	public function getPracticians()
	{
		return $this->listofpracticians;
	}
	
	public function __toString()
	{
		return $this->getName();
	}
  
 
}
