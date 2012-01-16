<?php

namespace ActualSkill\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * AttributeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AttributeRepository extends EntityRepository
{
    
    public function findAllByRatings(\ActualSkill\CoreBundle\Entity\BaseEntity $object, \ActualSkill\CoreBundle\Entity\User $user){
        
        return $this->getEntityManager()
        ->createQuery('SELECT a, AVG(r.rating) as average, COUNT(r.rating) as total, (SELECT r2.rating FROM ActualSkillCoreBundle:Rating r2 WHERE r2.object = ?1 AND r2.user = ?2 AND r2.attribute = a.id) as userrating FROM ActualSkillCoreBundle:Attribute a JOIN a.ratings as r WHERE r.object = ?1 GROUP BY r.attribute')
        ->setParameter(1, $object->getId())
        ->setParameter(2, $user->getId())
        ->getResult();                 
    }
    
    public function findBySlugWithRating($attribute_slug, \ActualSkill\CoreBundle\Entity\BaseEntity $object, \ActualSkill\CoreBundle\Entity\User $user){
        
        return $this->getEntityManager()
        ->createQuery('SELECT a, AVG(r.rating) as average, COUNT(r.rating) as total FROM ActualSkillCoreBundle:Attribute a JOIN a.ratings as r WHERE a.slug = ?1 AND r.object = ?2')
        ->setParameter(1, $attribute_slug)
        ->setParameter(2, $object->getId())
        ->getResult();                
    }    
}