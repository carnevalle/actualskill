<?php

namespace ActualSkill\SiteBundle\Services;

/**
 * Description of ActualSkillTwigExtensions
 *
 * @author troels.johnsen
 */
class ActualSkillTwigExtensions extends \Twig_Extension {

    public function getName()
    {
        return 'ActualSkillTwigExtensions';
    }
    
    public function getFunctions()
    {
        return array(
            'rating2color' => new \Twig_Function_Method($this, 'rating2color'),
            'normalizeRating' => new \Twig_Function_Method($this, 'normalizeRating'),
        );
    } 
    
    public function rating2color($rating){
        if($rating >= 7){
            return "high";
        }else if($rating < 4){
            return "low";
        }else{
            return "medium";
        }
    }   

    public function normalizeRating($rating){
        if(is_numeric($rating)){
            return $rating;
        }

        return "0.00";
    }
}

?>
