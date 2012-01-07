<?php

namespace ActualSkill\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class RatingType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('rating')
            ->add('modified_at')
            ->add('attribute')
            ->add('user')
            ->add('object')
        ;
    }

    public function getName()
    {
        return 'actualskill_CoreBundle_ratingtype';
    }
}
