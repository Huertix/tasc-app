<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="marcas")
 */
class Marca
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="utf8string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $codigo;
  /**
   * @ORM\Column(type="utf8string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $nombre;
  /**
   * @ORM\Column(type="binary", options={"default"=false})
   */
  private $vista;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $margen;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tcp;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $descuen;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $foto;
  /**
   * @ORM\Column(type="string", length=100, options={"fixed" = true}, nullable=false)
   */
  private $fonttpv;
  /**
   * @ORM\Column(type="binary", options={"default"=false})
   */
  private $vertpv;
  /**
   * @ORM\Column(type="decimal", precision=10, scale=0, nullable=false)
   */
  private $backcolor;
  /**
   * @ORM\Column(type="decimal", precision=10, scale=0, nullable=false)
   */
  private $forecolor;

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
  public function getVista() {
    return $this->vista;
  }

  /**
   * @param mixed $vista
   */
  public function setVista($vista) {
    $this->vista = $vista;
  }

  /**
   * @return mixed
   */
  public function getMargen() {
    return $this->margen;
  }

  /**
   * @param mixed $margen
   */
  public function setMargen($margen) {
    $this->margen = $margen;
  }

  /**
   * @return mixed
   */
  public function getTcp() {
    return $this->tcp;
  }

  /**
   * @param mixed $tcp
   */
  public function setTcp($tcp) {
    $this->tcp = $tcp;
  }

  /**
   * @return mixed
   */
  public function getDescuen() {
    return $this->descuen;
  }

  /**
   * @param mixed $descuen
   */
  public function setDescuen($descuen) {
    $this->descuen = $descuen;
  }

  /**
   * @return mixed
   */
  public function getFoto() {
    return $this->foto;
  }

  /**
   * @param mixed $foto
   */
  public function setFoto($foto) {
    $this->foto = $foto;
  }

  /**
   * @return mixed
   */
  public function getFonttpv() {
    return $this->fonttpv;
  }

  /**
   * @param mixed $fonttpv
   */
  public function setFonttpv($fonttpv) {
    $this->fonttpv = $fonttpv;
  }

  /**
   * @return mixed
   */
  public function getVertpv() {
    return $this->vertpv;
  }

  /**
   * @param mixed $vertpv
   */
  public function setVertpv($vertpv) {
    $this->vertpv = $vertpv;
  }

  /**
   * @return mixed
   */
  public function getBackcolor() {
    return $this->backcolor;
  }

  /**
   * @param mixed $backcolor
   */
  public function setBackcolor($backcolor) {
    $this->backcolor = $backcolor;
  }

  /**
   * @return mixed
   */
  public function getForecolor() {
    return $this->forecolor;
  }

  /**
   * @param mixed $forecolor
   */
  public function setForecolor($forecolor) {
    $this->forecolor = $forecolor;
  }



}