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
    
    public function doesUserLikeEntity(\ActualSkill\CoreBundle\Entity\BaseEntity $object, \ActualSkill\CoreBundle\Entity\User $user){
        $likes = $this->em
                ->createQuery('
                    SELECT
                    l
                    FROM ActualSkillCoreBundle:BaseEntityLike l
                    WHERE l.object = ?1
                    AND l.user = ?2
                ')
                ->setParameter(1, $object->getId())
                ->setParameter(2, $user->getId())
                ->getResult();        
        
        if($likes){
            return true;
        }else{
            return false;
        }
    }
    
    public function calculateRatings(){
        
        $entities = $this->em->getRepository('ActualSkillCoreBundle:BaseEntity')->findAll();
        
        // We get average rating, total number of ratings
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
        foreach($entities as $entity){
           
            // Shouldn't this only get ratings from attributes in the associated Rating Schema?
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
                ->setParameter(1, $entity->getId())
                ->getResult();
            
            if(count($ratings) > 0){
                $hasStatSheet = $this->em
                ->createQuery('
                    SELECT
                    s
                    FROM ActualSkillCoreBundle:StatSheet s 
                    WHERE s.object = ?1
                    AND s.created_at = ?2
                ')
                ->setParameter(1, $entity->getId())
                ->setParameter(2, date("Y-m-d"))
                ->getResult();
                
                if($hasStatSheet != null){
                    // We already have a statsheet
                    // For now we just continue
                    continue;
                }
                
                $num_attributes = count($entity->getRatingschema()->getAttributes());
                $num_ratings = count($ratings);
                
                // We abort if the RatingSchema has 0 attributes
                if($num_attributes == 0){
                    continue;
                }
                
                $statsheet = new \ActualSkill\CoreBundle\Entity\StatSheet();
                $statsheet->setObject($entity);                
                
                $avg_num_votes = $constants['total']/$constants['attributes'];
                $avg_rating = $constants['average'];
                
                $clean = 0;
                $weighted = 0;
                
                foreach ($ratings as $rating){
                    $calculatedRating = new \ActualSkill\CoreBundle\Entity\CalculatedRating();
                    $calculatedRating->setAttribute($rating[0]);
                    $calculatedRating->setAverageClean($rating['average']);
                    $calculatedRating->setNumberOfRatings($rating['total']);
                    $calculatedRating->setAverageWeighted($this->calculateBayesianRating($avg_num_votes, $avg_rating, $rating['total'], $rating['average']));
                    
                    $statsheet->addCalculatedRating($calculatedRating);
                    $calculatedRating->setStatsheet($statsheet);

                    // We count up 
                    $clean += $calculatedRating->getAverageClean();
                    $weighted += $calculatedRating->getAverageWeighted();
                }

                $statsheet->setAttributeRatingWeighted($weighted/$num_attributes);
                $statsheet->setAttributeRatingClean($clean/$num_attributes);
                $statsheet->setAttributesTotal($num_attributes);
                $statsheet->setAttributesRated($num_ratings);
                
                $entity->setRatingAverage($weighted/$num_attributes);
                
                $this->em->persist($entity);                
                $this->em->persist($statsheet);                
                
                $string .= $entity->getName().": ";
                $string .= "Attributes rated: ".$num_ratings."/".$num_attributes." ";
                $string .= "Average(clean): ".$statsheet->getAttributeRatingClean()." ";
                $string .= "Average(weighted): ".$statsheet->getAttributeRatingWeighted()." ";
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
