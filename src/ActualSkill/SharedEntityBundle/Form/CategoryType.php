<?php

namespace ActualSkill\SharedEntityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type')
            ->add('attributes')
        ;
    }

    public function getName()
    {
        return 'actualskill_sharedentitybundle_categorytype';
    }
}
