<?php

namespace ActualSkill\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        //parent::buildForm($builder, $options);

        // add your custom field
        $builder
            ->add('email', 'email')
            ->add('plainPassword', 'repeated', array('type' => 'password'))      
            ->add('firstname')
            ->add('lastname')
            ->add('nationality')
            ->add('club');
    }

    public function getName()
    {
        return 'actualskill_user_registration';
    }
}