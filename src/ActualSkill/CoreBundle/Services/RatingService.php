<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ActualSkill\CoreBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Description of RatingService
 *
 * @author troels.johnsen
 */
class RatingService {

    protected $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    
    public function calculateRatings(){
        
        $objects = $this->em->getRepository('ActualSkillCoreBundle:BaseEntity')->findAll();

        
        $constants = $this->em
                ->createQuery('
                    SELECT
                    AVG(r.rating) as average, 
                    COUNT(r.rating) as total,
                    (SELECT COUNT(DISTINCT a.id) FROM ActualSkillCoreBundle:Attribute a JOIN a.ratings r2) as attributes
                    FROM ActualSkillCoreBundle:Rating r
                ')
                ->getSingleResult();
        
        $string = "";
        foreach($objects as $object){
            $ratings = $this->em
                ->createQuery('
                    SELECT
                    a,
                    AVG(r.rating) as average, 
                    COUNT(r.rating) as total,
                    MAX(r.rating) as highest,
                    MAX(r.rating) as lowest
                    FROM ActualSkillCoreBundle:Attribute a 
                    JOIN a.ratings as r
                    WHERE r.object = ?1
                    GROUP BY r.attribute
                ')
                ->setParameter(1, $object->getId())
                ->getResult();
            
            if(count($ratings) > 0){
                
                $statsheet = new \ActualSkill\CoreBundle\Entity\StatSheet();
                $statsheet->setObject($object);                
                
                $avg_num_votes = $constants['average']/$constants['attributes'];
                $avg_rating = $constants['average'];
                
                $num=0;
                $sum = 0;
                
                foreach ($ratings as $rating){
                    $calculatedRating = new \ActualSkill\CoreBundle\Entity\CalculatedRating();
                    $calculatedRating->setAttribute($rating[0]);
                    $calculatedRating->setAverageClean($rating['average']);
                    $calculatedRating->setNumberOfRatings($rating['total']);
                    $calculatedRating->setAverageWeighted($this->calculateBayesianRating($avg_num_votes, $avg_rating, $rating['total'], $rating['average']));
                    
                    $statsheet->addCalculatedRating($calculatedRating);
                    $calculatedRating->setStatsheet($statsheet);

                    $sum += $calculatedRating->getAverageWeighted();
                    $num++;
                }

                $average = $sum/$num;
                $statsheet->setRating($average);
                
                $this->em->persist($statsheet);                
                
                $string .= $object->getName().": ";
                $string .= "Attributes: ".$num." ";
                $string .= "Average: ".$average;
                $string .= "\n"; 
            }               
        }
        
        $this->em->flush();
    
        return $string;
    }
    
    private function calculateBayesianRating($avg_num_votes, $avg_rating, $this_num_votes, $this_rating){
        return ( ($avg_num_votes * $avg_rating) + ($this_num_votes * $this_rating) ) / ($avg_num_votes + $this_num_votes);
    }
    
    /*
     * This function adds user ratings to a base entity object
     */
    public function addUserRatingsToBaseEntity(\ActualSkill\CoreBundle\Entity\BaseEntity $object, \ActualSkill\CoreBundle\Entity\User $user){
        
        $categories = $object->getRatingschema()->getCategories();
        
        $ratings = $this->em
        ->createQuery('
            SELECT 
            a, 
            AVG(r.rating) as average, COUNT(r.rating) as total, 
            (SELECT r2.rating FROM ActualSkillCoreBundle:Rating r2 WHERE r2.object = ?1 AND r2.user = ?2 AND r2.attribute = a.id) as userrating 
            FROM ActualSkillCoreBundle:Attribute a 
            JOIN a.ratings as r 
            WHERE r.object = ?1 
            GROUP BY r.attribute')
        ->setParameter(1, $object->getId())
        ->setParameter(2, $user->getId())
        ->getResult();
        
        
        if(!is_null($categories)){
            foreach ($categories as $category) {
                
                $i = 0;
                
                foreach($category->getAttributes() as $attribute){
                    foreach($ratings as $rating){
                        if($attribute->getId() == $rating[0]->getId()){
                            $attribute->setAverageRating($rating['average']);
                            $attribute->setUserRating($rating['userrating']);
                            $attribute->setNumberOfRatings($rating['total']);
                        }
                    }
                }
            }
        }
        
        return $object;
    }
}

?>
