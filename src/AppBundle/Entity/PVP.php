<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pvp")
 */
class PVP
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="string", length=20, options={"fixed" = true}, nullable=false)
   */
  private $articulo;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $pvp;

  /**
   * @ORM\Column(type="datetime", nullable=false)
   */
  private $fechaini;

  /**
   * One Cart has One Customer.
   * @ORM\OneToOne(targetEntity="Articulo", inversedBy="pvp")
   * @ORM\JoinColumn(name="articulo", referencedColumnName="codigo")
   */
  private $articulo_root;

  /**
   * @return mixed
   */
  public function getArticulo() {
    return $this->articulo;
  }

  /**
   * @param mixed $articulo
   */
  public function setArticulo($articulo) {
    $this->articulo = $articulo;
  }

  /**
   * @return mixed
   */
  public function getPvp() {
    return $this->pvp;
  }

  /**
   * @param mixed $pvp
   */
  public function setPvp($pvp) {
    $this->pvp = $pvp;
  }

  /**
   * @return mixed
   */
  public function getFechaini() {
    return $this->fechaini;
  }

  /**
   * @param mixed $fechaini
   */
  public function setFechaini($fechaini) {
    $this->fechaini = $fechaini;
  }



}