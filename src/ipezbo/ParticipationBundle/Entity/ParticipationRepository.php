<?php

namespace ipezbo\ParticipationBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ParticipationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ParticipationRepository extends EntityRepository {

    public function getParticipationByEvent($id) {

        $qb = $this->createQueryBuilder('p')
                ->leftJoin('p.customer', 'c')
                ->addSelect('c')
                ->leftJoin('p.event', 'e')
                ->addSelect('e');
        $qb->where('p.event_id = :id')
                ->setParameter('id', $id);


        return $qb->getQuery()->getResult();
    }

}
