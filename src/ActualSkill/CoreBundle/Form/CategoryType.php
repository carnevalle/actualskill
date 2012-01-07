<?php

namespace ActualSkill\CoreBundle\Form;

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
        
        $builder->get('attributes')->setRequired(false);
    }

    public function getName()
    {
        return 'actualskill_CoreBundle_categorytype';
    }
}
