<?php

namespace ActualSkill\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('nickname')
            ->add('birthday')
            ->add('height')
            ->add('weight')
            ->add('country')
        ;
    }

    public function getName()
    {
        return 'actualskill_sitebundle_playertype';
    }
}
