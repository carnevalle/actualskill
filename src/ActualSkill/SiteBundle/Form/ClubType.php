<?php

namespace ActualSkill\SiteBundle\Form;

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
        ;
    }

    public function getName()
    {
        return 'actualskill_sitebundle_clubtype';
    }
}
