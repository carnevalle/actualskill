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

            //$statsheet = new \ActualSkill\CoreBundle\Entity\StatSheet();
            //$statsheet->setObject($object);
            //$em->persist($statsheet);
            
            $string .= $object->getName().": ";
            
            foreach ($ratings as $rating){
                $string .= $rating['lowest'];
            }
            
            $string .= "\n";
        }
        
        //$em->flush();
    
        /*
        $attributes = $this->em
                ->createQuery('
                    SELECT
                    
                    

                ')
                ->getResult();
        
        $ratings = $this->getEntityManager()
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
        */
        
        return $string;
    }
    
    public function test(){
        return "This is a test!!!";
    }
}

?>
