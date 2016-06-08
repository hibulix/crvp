<?php

namespace KA\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="KA\PlatformBundle\Entity\QuestionRepository")
 */
class Question
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50)
	 * @Assert\Length(max=50)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50)
	 * @Assert\Length(max=50)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
	 * @Assert\Length(max=100)
	 * @Assert\Email(
	 *		message = "'{{ value }}' n'est pas un mail valide.",
	 *		checkMX = true 
	 *	)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=10)
	 * @Assert\Length(
	 *		min=10,
	 *		max=10,
	 *		minMessage = "Votre numéro doit être composé de {{ limit }} chiffres.",
	 *		maxMessage = "Votre numéro ne peut être plus long que {{ limit }} chiffres."
	 *	)
	 *  @Assert\Regex(
	 *  	pattern = "/\d/",
     *      match 	= true,
     *      message = "Votre numéro doit comporter que des chiffres."
	 * 	)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

	/**
     * @var text
     *
     * @ORM\Column(name="body", type="text", length=255)
     */
	private $body;
	
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
	 * @Assert\DateTime()
     */
    private $date;

	public function __construct()
	{
		$this->date = new \Datetime();
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
     * @return Question
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
     * @return Question
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
     * Set email
     *
     * @param string $email
     * @return Question
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Question
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set subject
     *
     * @param string $subject
     * @return Question
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

	/**
     * Set body
     *
     * @param text $body
     * @return Question
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }
	
	/**
     * Get body
     *
     * @return text
     */
    public function getBody()
    {
        return $this->body;
	}
	
    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Question
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
}
