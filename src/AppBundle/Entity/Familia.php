<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="familias")
 */
class Familia
{

  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $codigo;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $nombre;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $cta_compra;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $cta_venta;
  /**
   * @ORM\Column(type="binary", options={"default"=false})
   */
  private $vista;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $cod_intra;
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
   * @ORM\Column(type="string", length=250, options={"fixed" = true}, nullable=false)
   */
  private $foto;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $orden;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $junfra;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $nonavi;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $guid;
  /**
   * @ORM\Column(type="datetime")
   */
  private $importar;
  /**
   * @ORM\Column(type="datetime")
   */
  private $exportar;
  /**
   * @ORM\Column(type="string", length=100, options={"fixed" = true}, nullable=false)
   */
  private $fonttpv;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
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
  public function getCtaCompra() {
    return $this->cta_compra;
  }

  /**
   * @param mixed $cta_compra
   */
  public function setCtaCompra($cta_compra) {
    $this->cta_compra = $cta_compra;
  }

  /**
   * @return mixed
   */
  public function getCtaVenta() {
    return $this->cta_venta;
  }

  /**
   * @param mixed $cta_venta
   */
  public function setCtaVenta($cta_venta) {
    $this->cta_venta = $cta_venta;
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
  public function getCodIntra() {
    return $this->cod_intra;
  }

  /**
   * @param mixed $cod_intra
   */
  public function setCodIntra($cod_intra) {
    $this->cod_intra = $cod_intra;
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
  public function getOrden() {
    return $this->orden;
  }

  /**
   * @param mixed $orden
   */
  public function setOrden($orden) {
    $this->orden = $orden;
  }

  /**
   * @return mixed
   */
  public function getJunfra() {
    return $this->junfra;
  }

  /**
   * @param mixed $junfra
   */
  public function setJunfra($junfra) {
    $this->junfra = $junfra;
  }

  /**
   * @return mixed
   */
  public function getNonavi() {
    return $this->nonavi;
  }

  /**
   * @param mixed $nonavi
   */
  public function setNonavi($nonavi) {
    $this->nonavi = $nonavi;
  }

  /**
   * @return mixed
   */
  public function getGuid() {
    return $this->guid;
  }

  /**
   * @param mixed $guid
   */
  public function setGuid($guid) {
    $this->guid = $guid;
  }

  /**
   * @return mixed
   */
  public function getImportar() {
    return $this->importar;
  }

  /**
   * @param mixed $importar
   */
  public function setImportar($importar) {
    $this->importar = $importar;
  }

  /**
   * @return mixed
   */
  public function getExportar() {
    return $this->exportar;
  }

  /**
   * @param mixed $exportar
   */
  public function setExportar($exportar) {
    $this->exportar = $exportar;
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