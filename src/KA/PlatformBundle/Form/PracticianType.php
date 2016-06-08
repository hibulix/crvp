<?php

namespace KA\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\EntityDirectory;
use KA\PlatformBundle\Entity\PracticianRepository;
use KA\PlatformBundle\Entity\Patient;

class PracticianType extends AbstractType
{
	/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('user', 'entity', array(
				'class'		=> 'KAPlatformBundle:Practician',
				'label'		=> 'Liste des médecins',
				'property'  => 'Name',
				'required'	=> true,
				'query_builder'  => function(PracticianRepository $repo) {
					return $repo->getAllPracticians();
				}
			)
		);
		
		$formModifier = function( FormInterface $form, Practician $practician = null) {
			$listofpatients = null === $practician ? array() : $practician->getPatients();
			
			$form->add('patients', 'entity',  array(
					'class'			=> 'KAPlatformBundle:Patient',
					'label'			=> 'Liste de ses patients',
			));
		};
		
		$builder->addEventListener(
			FormEvents::PRE_SET_DATA, 
			function (FormEvent $event) use ($formModifier) {
				$practician = $event->getData();
				$formModifier($event->getForm(), $practician);
			}
		);
		
		
	}

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KA\PlatformBundle\Entity\Practician'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ka_platformbundle_practician';
    }
}
