<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PresupuestoRepository extends EntityRepository {

	/**
     * @return Presupuesto[]
     */
	public function presupuestosOrderedByDate() {
		return $this->createQueryBuilder('presupuesto')
            ->orderBy('presupuesto.fecha', 'DESC')
            ->getQuery()
            ->execute();
	}

}