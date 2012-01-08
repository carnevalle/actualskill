<?php

namespace ActualSkill\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RatingSchemaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('slug')
            ->add('description')
            ->add('categories')
        ;
        
        $builder->get('description')->setRequired(false);
        $builder->get('categories')->setRequired(false);
    }

    public function getName()
    {
        return 'actualskill_corebundle_ratingschematype';
    }
}
