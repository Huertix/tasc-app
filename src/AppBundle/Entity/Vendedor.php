<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vendedor")
 */
class Vendedor
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $codigo;
  /**
   * @ORM\Column(type="string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $nombre;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $password;

  /**
   * @return mixed
   */
  public function getCodigo() {
    return $this->codigo;
  }

  /**
   * @param mixed $codigo
   */
  public function setCodigo($codigo) {
    $this->codigo = $codigo;
  }

  /**
   * @return mixed
   */
  public function getNombre() {
    return $this->nombre;
  }

  /**
   * @param mixed $nombre
   */
  public function setNombre($nombre) {
    $this->nombre = $nombre;
  }

  /**
   * @return mixed
   */
  public function getPassword() {
    return $this->password;
  }

  /**
   * @param mixed $password
   */
  public function setPassword($password) {
    $this->password = $password;
  }



}