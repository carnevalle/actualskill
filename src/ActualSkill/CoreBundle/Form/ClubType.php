<?php

namespace ActualSkill\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ClubType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('shortname')
            ->add('country')
            ->add('ratingschema')
        ;
    }

    public function getName()
    {
        return 'actualskill_CoreBundle_clubtype';
    }
}
