<?php

namespace ActualSkill\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ActualSkillUserBundle extends Bundle
{
    
    public function getParent()
    {
        return 'FOSUserBundle';
    }    
    
}
