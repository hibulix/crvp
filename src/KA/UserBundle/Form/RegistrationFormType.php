<?php

namespace KA\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
	/**
     * @param FormBuilderInterface $builder
     * @param  array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
			->add('lastname', 			'text', 	array('label' => 'Nom'))
			->add('firstname', 			'text', 	array('label' => 'Prénom'))
			->add('adress', 			'text', 	array('label' => 'Adresse'))
			->add('businessTelephone', 	'text', 	array('label' => 'Téléphone professionnel'))
			->add('mobileTelephone',	'text',		array('label' => 'Téléphone portable'))
		;
		parent::buildForm($builder, $options);
    }

    public function getName()
    {
        return 'ka_userbundle_registration';
    }
}