<?php

namespace KA\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class QuestionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname',	'text', array('label' => 'Nom'))
            ->add('firstname',	'text', array('label' => 'Prénom'))
            ->add('email',		'text', array('label' => 'Mail'))
            ->add('phoneNumber','text', array('label' => 'Numéro de téléphone'))
            ->add('subject',	'text', array('label' => 'Objet'))
			->add('body',		'textarea', array('label' => 'Message'))
		;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KA\PlatformBundle\Entity\Question'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ka_platformbundle_question';
    }
}
