<?php

namespace ActualSkill\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class StadiumType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('capacity')
        ;
    }

    public function getName()
    {
        return 'actualskill_CoreBundle_stadiumtype';
    }
}
