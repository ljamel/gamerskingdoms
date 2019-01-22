<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

		 $builder->add('roles', ChoiceType::class, array(
                'attr'  =>  array('class' => 'form-control',
                    'style' => 'margin:5px 0;'),
                'choices' =>
                    array
                    (
                            'ROLE_AUTEUR' => 'ROLE_AUTEUR',
                            'ROLE_MODERATEUR' => 'ROLE_MODERATEUR',
                            'ROLE_USER' => 'ROLE_USER'
                    ) ,
                'multiple' => true,
                'required' => true,
            )
        );
        
        $builder->add('console', ChoiceType::class, [
            'choices' => [
                'Main Statuses' => [
                    'xbox' => 'xbox',
                    'playstation' => 'playstation',
                    'computer' => 'computer',
                ],
                'Out of Stock Statuses' => [
                    'nintendo' => 'nintendo',
                    'other' => 'other',
                ],
            ],
        ]);

		
    }

    public function getParent()
    {		
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }


}