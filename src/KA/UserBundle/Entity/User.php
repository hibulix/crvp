<?php

namespace KA\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * User 
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KA\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
    
    /**
     * @var string
	 *
	 * @ORM\Column(name="last_name", type="string", length=50, nullable=true)
     */
    private $lastname;

    /**
     * @var string
	 *
	 * @ORM\Column(name="first_name", type="string", length=50, nullable=true)
     */
    private $firstname;

	/**
     * @var string
	 *
	 * @ORM\Column(name="adress", type="string", length=255, nullable=true)
	 */
	private $adress;
	
	/**
     * @var string
	 *
	 * @ORM\Column(name="business_telephone", type="string", length=10, nullable=true)
	 */
	private $businessTelephone;
	
	/**
     * @var string
	 *
	 * @ORM\Column(name="mobile_telephone", type="string", length=10, nullable=true)
	 */
	private $mobileTelephone;
	
	
    /**
     * @var \DateTime
	 *
	 * @ORM\Column(name="recording_date", type="datetime", nullable=true)
     */
    private $recordingdate;

    /**
     * @var string
	 *
	 * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

	public function __construct()
	{
		parent::__construct();
		$this->recordingdate = new \Datetime('NOW');
		$this->addRole('ROLE_PRACTICIAN');
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
     * Set lastname
     *
     * @param string $lastname
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string 
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

	/**
	* Set adress
	*
	* @param string adress
	* @return User
	*/
	public function setAdress($adress)
	{
		$this->adress = $adress;
		return $this;
	}
	
	/**
	* Get adress
	*
	* @return string
	*/
	public function getAdress()
	{
		return $this->adress;
	}
	
	/**
	* Set businessTelephone
	*
	* @param string
	* @return User
	*/
	public function setBusinessTelephone($businessTelephone)
	{
		$this->businessTelephone = $businessTelephone;
		return $this;
	}
	
	/**
	* Get businessTelephone
	*
	* @return string
	*/
	public function getBusinessTelephone()
	{
		$this->businessTelephone;
	}
	
	/**
	* Set mobileTelephone
	*
	* @param string
	* @return User
	*/
	public function setMobileTelephone($mobileTelephone)
	{
		$this->mobileTelephone = $mobileTelephone;
		return $this;
	}
	
	/**
	* Get mobileTelephone
	*
	* @return string
	*/
	public function getMobileTelephone()
	{
		$this->mobileTelephone;
	}
	
    /**
     * Set recordingdate
     *
     * @param \DateTime $recordingdate
     * @return User
     */
    public function setRecordingdate($recordingdate)
    {
        $this->recordingdate = $recordingdate;
        return $this;
    }

    /**
     * Get recordingdate
     *
     * @return \DateTime 
     */
    public function getRecordingdate()
    {
        return $this->recordingdate;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return User
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
