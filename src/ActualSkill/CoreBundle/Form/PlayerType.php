<?php

namespace ActualSkill\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstname')
            ->add('lastname')
            ->add('nickname')
            ->add('twitter')
            ->add('birthday', 'birthday', array('widget' => 'choice', 'years' => range(date('Y')-100,date('Y'))))
            ->add('height')
            ->add('weight')
            ->add('isGoalkeeper')
            ->add('club')
            ->add('country')
        ;
        
        $builder->get('name')->setRequired(false);
        $builder->get('nickname')->setRequired(false);
        $builder->get('twitter')->setRequired(false);
        $builder->get('club')->setRequired(false);
        $builder->get('isGoalkeeper')->setRequired(false);        
    }

    public function getName()
    {
        return 'actualskill_CoreBundle_playertype';
    }
}
