<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ActualSkill\CoreBundle\Services;

/**
 * Description of RatingService
 *
 * @author troels.johnsen
 */
class RatingService {

    public function __construct()
    {

    }
    
    public function calculateRatings(){
        $em = $this->getDoctrine()->getEntityManager();
        $players = $em->getRepository('ActualSkillCoreBundle:Player')->findAll();
    }
    
    public function test(){
        return "This is a test!!!";
    }
}

?>
