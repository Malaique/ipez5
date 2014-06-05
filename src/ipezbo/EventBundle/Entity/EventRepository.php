<?php

namespace ipezbo\EventBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends EntityRepository {

    public function getEventByOrder($order) {
        $qb = $this->createQueryBuilder('e')
                ->orderBy('e.name', $order);
        
        return $qb;
    }

}
