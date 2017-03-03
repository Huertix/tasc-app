<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ClienteRepository extends EntityRepository {

	/**
     * @return Cliente[]
     */
	public function clientesOrderedByName() {
		return $this->createQueryBuilder('cliente')
            ->orderBy('cliente.nombre', 'ASC')
            ->getQuery()
            ->execute();
	}

}