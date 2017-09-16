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

  public function countClientes() {
    $qb = $this->createQueryBuilder('c');
    $qb->select('count(c.codigo)');
    //$qb->where('t.codigo = :codigo');
    //$qb->setParameter('codigo', codigo);
    $total_clients = $qb->getQuery()->getSingleScalarResult();
    return $total_clients;
  }

}