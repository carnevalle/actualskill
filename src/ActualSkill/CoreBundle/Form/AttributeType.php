<?php

namespace ActualSkill\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class AttributeType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
        ;
        
        $builder->get('description')->setRequired(false);
    }

    public function getName()
    {
        return 'actualskill_CoreBundle_attributetype';
    }
}
