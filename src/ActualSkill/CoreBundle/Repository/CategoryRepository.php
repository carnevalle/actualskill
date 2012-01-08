<?php

namespace ActualSkill\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends EntityRepository
{
    
    public function findByTypeWithAverage($type, \ActualSkill\CoreBundle\Entity\BaseEntity $object, \ActualSkill\CoreBundle\Entity\User $user){
        
        $categories = $this->findByType($type);
        
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
        
        return $categories;
    }
}