<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articulo")
 */
class Articulo
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="string", length=20, options={"fixed" = true}, nullable=false)
   */
  private $codigo;
  /**
   * @ORM\Column(type="string", length=75, options={"fixed" = true}, nullable=false)
   */
  private $nombre;
  /**
   * @ORM\Column(type="string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $abrev;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $familia;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $marca;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $minimo;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $maximo;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $aviso;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $baja;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipo_iva;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $retencion;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $iva_inc;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $cost_ult1;
  /**
   * @ORM\Column(type="datetime")
   */
  private $fecha_ult;
  /**
   * @ORM\Column(type="datetime")
   */
  private $ult_fecha;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $pmcom1;
  /**
   * @ORM\Column(type="string", length=90, options={"fixed" = true}, nullable=false)
   */
  private $imagen;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $carac;
  /**
   * @ORM\Column(type="datetime", nullable=false)
   */
  private $fechaalta;
  /**
   * @ORM\Column(type="datetime", nullable=false)
   */
  private $fechabaja;
  /**
   * @ORM\Column(type="string", length=150, options={"fixed" = true}, nullable=false)
   */
  private $ubicacion;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $medidas;
  /**
   * @ORM\Column(type="string", length=12, options={"fixed" = true}, nullable=false)
   */
  private $peso;
  /**
   * @ORM\Column(type="string", length=12, options={"fixed" = true}, nullable=false)
   */
  private $litros;
  /**
   * @ORM\Column(type="text")
   */
  private $observacio;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $unicaja;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $desglose;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $aranceles;
  /**
   * @ORM\Column(type="text")
   */
  private $definicion2;
  /**
   * @ORM\Column(type="string", length=4, options={"fixed" = true}, nullable=false)
   */
  private $subfamilia;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $internet;
  /**
   * @ORM\Column(type="binary", options={"default"=false})
   */
  private $vista;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $fpag;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $pverde;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $p_importe;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $p_tan;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $lcolor;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $margen;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tcp;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $venserie;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $puntos;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $des_esc;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $tipo_art;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $modelo;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $cocina;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $stock;
  /**
   * @ORM\Column(type="string", length=20, options={"fixed" = true}, nullable=false)
   */
  private $art_impues;
  /**
   * @ORM\Column(type="text", nullable=false)
   */
  private $nombre2;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $color_art;
  /**
   * @ORM\Column(type="decimal", precision=1, scale=0, nullable=false)
   */
  private $tipo_pvp;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $cost_escan;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $tipo_escan;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $art_canon;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $actua_colo;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $fact_arepe;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $garantia;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $alquiler;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $orden;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $c_ent;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $cn8;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $ivalot;
  /**
   * @ORM\Column(type="string", length=20, options={"fixed" = true}, nullable=false)
   */
  private $artant;
  /**
   * @ORM\Column(type="string", length=25, options={"fixed" = true}, nullable=false)
   */
  private $reportetiq;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $guid;
  /**
   * @ORM\Column(type="datetime")
   */
  private $importar;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $dto1;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $dto2;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $dto3;

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
  public function getAbrev() {
    return $this->abrev;
  }

  /**
   * @param mixed $abrev
   */
  public function setAbrev($abrev) {
    $this->abrev = $abrev;
  }

  /**
   * @return mixed
   */
  public function getFamilia() {
    return $this->familia;
  }

  /**
   * @param mixed $familia
   */
  public function setFamilia($familia) {
    $this->familia = $familia;
  }

  /**
   * @return mixed
   */
  public function getMarca() {
    return $this->marca;
  }

  /**
   * @param mixed $marca
   */
  public function setMarca($marca) {
    $this->marca = $marca;
  }

  /**
   * @return mixed
   */
  public function getMinimo() {
    return $this->minimo;
  }

  /**
   * @param mixed $minimo
   */
  public function setMinimo($minimo) {
    $this->minimo = $minimo;
  }

  /**
   * @return mixed
   */
  public function getMaximo() {
    return $this->maximo;
  }

  /**
   * @param mixed $maximo
   */
  public function setMaximo($maximo) {
    $this->maximo = $maximo;
  }

  /**
   * @return mixed
   */
  public function getAviso() {
    return $this->aviso;
  }

  /**
   * @param mixed $aviso
   */
  public function setAviso($aviso) {
    $this->aviso = $aviso;
  }

  /**
   * @return mixed
   */
  public function getBaja() {
    return $this->baja;
  }

  /**
   * @param mixed $baja
   */
  public function setBaja($baja) {
    $this->baja = $baja;
  }

  /**
   * @return mixed
   */
  public function getTipoIva() {
    return $this->tipo_iva;
  }

  /**
   * @param mixed $tipo_iva
   */
  public function setTipoIva($tipo_iva) {
    $this->tipo_iva = $tipo_iva;
  }

  /**
   * @return mixed
   */
  public function getRetencion() {
    return $this->retencion;
  }

  /**
   * @param mixed $retencion
   */
  public function setRetencion($retencion) {
    $this->retencion = $retencion;
  }

  /**
   * @return mixed
   */
  public function getIvaInc() {
    return $this->iva_inc;
  }

  /**
   * @param mixed $iva_inc
   */
  public function setIvaInc($iva_inc) {
    $this->iva_inc = $iva_inc;
  }

  /**
   * @return mixed
   */
  public function getCostUlt1() {
    return $this->cost_ult1;
  }

  /**
   * @param mixed $cost_ult1
   */
  public function setCostUlt1($cost_ult1) {
    $this->cost_ult1 = $cost_ult1;
  }

  /**
   * @return mixed
   */
  public function getFechaUlt() {
    return $this->fecha_ult;
  }

  /**
   * @param mixed $fecha_ult
   */
  public function setFechaUlt($fecha_ult) {
    $this->fecha_ult = $fecha_ult;
  }

  /**
   * @return mixed
   */
  public function getUltFecha() {
    return $this->ult_fecha;
  }

  /**
   * @param mixed $ult_fecha
   */
  public function setUltFecha($ult_fecha) {
    $this->ult_fecha = $ult_fecha;
  }

  /**
   * @return mixed
   */
  public function getPmcom1() {
    return $this->pmcom1;
  }

  /**
   * @param mixed $pmcom1
   */
  public function setPmcom1($pmcom1) {
    $this->pmcom1 = $pmcom1;
  }

  /**
   * @return mixed
   */
  public function getImagen() {
    return $this->imagen;
  }

  /**
   * @param mixed $imagen
   */
  public function setImagen($imagen) {
    $this->imagen = $imagen;
  }

  /**
   * @return mixed
   */
  public function getCarac() {
    return $this->carac;
  }

  /**
   * @param mixed $carac
   */
  public function setCarac($carac) {
    $this->carac = $carac;
  }

  /**
   * @return mixed
   */
  public function getFechaalta() {
    return $this->fechaalta;
  }

  /**
   * @param mixed $fechaalta
   */
  public function setFechaalta($fechaalta) {
    $this->fechaalta = $fechaalta;
  }

  /**
   * @return mixed
   */
  public function getFechabaja() {
    return $this->fechabaja;
  }

  /**
   * @param mixed $fechabaja
   */
  public function setFechabaja($fechabaja) {
    $this->fechabaja = $fechabaja;
  }

  /**
   * @return mixed
   */
  public function getUbicacion() {
    return $this->ubicacion;
  }

  /**
   * @param mixed $ubicacion
   */
  public function setUbicacion($ubicacion) {
    $this->ubicacion = $ubicacion;
  }

  /**
   * @return mixed
   */
  public function getMedidas() {
    return $this->medidas;
  }

  /**
   * @param mixed $medidas
   */
  public function setMedidas($medidas) {
    $this->medidas = $medidas;
  }

  /**
   * @return mixed
   */
  public function getPeso() {
    return $this->peso;
  }

  /**
   * @param mixed $peso
   */
  public function setPeso($peso) {
    $this->peso = $peso;
  }

  /**
   * @return mixed
   */
  public function getLitros() {
    return $this->litros;
  }

  /**
   * @param mixed $litros
   */
  public function setLitros($litros) {
    $this->litros = $litros;
  }

  /**
   * @return mixed
   */
  public function getObservacio() {
    return $this->observacio;
  }

  /**
   * @param mixed $observacio
   */
  public function setObservacio($observacio) {
    $this->observacio = $observacio;
  }

  /**
   * @return mixed
   */
  public function getUnicaja() {
    return $this->unicaja;
  }

  /**
   * @param mixed $unicaja
   */
  public function setUnicaja($unicaja) {
    $this->unicaja = $unicaja;
  }

  /**
   * @return mixed
   */
  public function getDesglose() {
    return $this->desglose;
  }

  /**
   * @param mixed $desglose
   */
  public function setDesglose($desglose) {
    $this->desglose = $desglose;
  }

  /**
   * @return mixed
   */
  public function getAranceles() {
    return $this->aranceles;
  }

  /**
   * @param mixed $aranceles
   */
  public function setAranceles($aranceles) {
    $this->aranceles = $aranceles;
  }

  /**
   * @return mixed
   */
  public function getDefinicion2() {
    return $this->definicion2;
  }

  /**
   * @param mixed $definicion2
   */
  public function setDefinicion2($definicion2) {
    $this->definicion2 = $definicion2;
  }

  /**
   * @return mixed
   */
  public function getSubfamilia() {
    return $this->subfamilia;
  }

  /**
   * @param mixed $subfamilia
   */
  public function setSubfamilia($subfamilia) {
    $this->subfamilia = $subfamilia;
  }

  /**
   * @return mixed
   */
  public function getInternet() {
    return $this->internet;
  }

  /**
   * @param mixed $internet
   */
  public function setInternet($internet) {
    $this->internet = $internet;
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
  public function getFpag() {
    return $this->fpag;
  }

  /**
   * @param mixed $fpag
   */
  public function setFpag($fpag) {
    $this->fpag = $fpag;
  }

  /**
   * @return mixed
   */
  public function getPverde() {
    return $this->pverde;
  }

  /**
   * @param mixed $pverde
   */
  public function setPverde($pverde) {
    $this->pverde = $pverde;
  }

  /**
   * @return mixed
   */
  public function getPImporte() {
    return $this->p_importe;
  }

  /**
   * @param mixed $p_importe
   */
  public function setPImporte($p_importe) {
    $this->p_importe = $p_importe;
  }

  /**
   * @return mixed
   */
  public function getPTan() {
    return $this->p_tan;
  }

  /**
   * @param mixed $p_tan
   */
  public function setPTan($p_tan) {
    $this->p_tan = $p_tan;
  }

  /**
   * @return mixed
   */
  public function getLcolor() {
    return $this->lcolor;
  }

  /**
   * @param mixed $lcolor
   */
  public function setLcolor($lcolor) {
    $this->lcolor = $lcolor;
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
  public function getVenserie() {
    return $this->venserie;
  }

  /**
   * @param mixed $venserie
   */
  public function setVenserie($venserie) {
    $this->venserie = $venserie;
  }

  /**
   * @return mixed
   */
  public function getPuntos() {
    return $this->puntos;
  }

  /**
   * @param mixed $puntos
   */
  public function setPuntos($puntos) {
    $this->puntos = $puntos;
  }

  /**
   * @return mixed
   */
  public function getDesEsc() {
    return $this->des_esc;
  }

  /**
   * @param mixed $des_esc
   */
  public function setDesEsc($des_esc) {
    $this->des_esc = $des_esc;
  }

  /**
   * @return mixed
   */
  public function getTipoArt() {
    return $this->tipo_art;
  }

  /**
   * @param mixed $tipo_art
   */
  public function setTipoArt($tipo_art) {
    $this->tipo_art = $tipo_art;
  }

  /**
   * @return mixed
   */
  public function getModelo() {
    return $this->modelo;
  }

  /**
   * @param mixed $modelo
   */
  public function setModelo($modelo) {
    $this->modelo = $modelo;
  }

  /**
   * @return mixed
   */
  public function getCocina() {
    return $this->cocina;
  }

  /**
   * @param mixed $cocina
   */
  public function setCocina($cocina) {
    $this->cocina = $cocina;
  }

  /**
   * @return mixed
   */
  public function getStock() {
    return $this->stock;
  }

  /**
   * @param mixed $stock
   */
  public function setStock($stock) {
    $this->stock = $stock;
  }

  /**
   * @return mixed
   */
  public function getArtImpues() {
    return $this->art_impues;
  }

  /**
   * @param mixed $art_impues
   */
  public function setArtImpues($art_impues) {
    $this->art_impues = $art_impues;
  }

  /**
   * @return mixed
   */
  public function getNombre2() {
    return $this->nombre2;
  }

  /**
   * @param mixed $nombre2
   */
  public function setNombre2($nombre2) {
    $this->nombre2 = $nombre2;
  }

  /**
   * @return mixed
   */
  public function getColorArt() {
    return $this->color_art;
  }

  /**
   * @param mixed $color_art
   */
  public function setColorArt($color_art) {
    $this->color_art = $color_art;
  }

  /**
   * @return mixed
   */
  public function getTipoPvp() {
    return $this->tipo_pvp;
  }

  /**
   * @param mixed $tipo_pvp
   */
  public function setTipoPvp($tipo_pvp) {
    $this->tipo_pvp = $tipo_pvp;
  }

  /**
   * @return mixed
   */
  public function getCostEscan() {
    return $this->cost_escan;
  }

  /**
   * @param mixed $cost_escan
   */
  public function setCostEscan($cost_escan) {
    $this->cost_escan = $cost_escan;
  }

  /**
   * @return mixed
   */
  public function getTipoEscan() {
    return $this->tipo_escan;
  }

  /**
   * @param mixed $tipo_escan
   */
  public function setTipoEscan($tipo_escan) {
    $this->tipo_escan = $tipo_escan;
  }

  /**
   * @return mixed
   */
  public function getArtCanon() {
    return $this->art_canon;
  }

  /**
   * @param mixed $art_canon
   */
  public function setArtCanon($art_canon) {
    $this->art_canon = $art_canon;
  }

  /**
   * @return mixed
   */
  public function getActuaColo() {
    return $this->actua_colo;
  }

  /**
   * @param mixed $actua_colo
   */
  public function setActuaColo($actua_colo) {
    $this->actua_colo = $actua_colo;
  }

  /**
   * @return mixed
   */
  public function getFactArepe() {
    return $this->fact_arepe;
  }

  /**
   * @param mixed $fact_arepe
   */
  public function setFactArepe($fact_arepe) {
    $this->fact_arepe = $fact_arepe;
  }

  /**
   * @return mixed
   */
  public function getGarantia() {
    return $this->garantia;
  }

  /**
   * @param mixed $garantia
   */
  public function setGarantia($garantia) {
    $this->garantia = $garantia;
  }

  /**
   * @return mixed
   */
  public function getAlquiler() {
    return $this->alquiler;
  }

  /**
   * @param mixed $alquiler
   */
  public function setAlquiler($alquiler) {
    $this->alquiler = $alquiler;
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
  public function getCEnt() {
    return $this->c_ent;
  }

  /**
   * @param mixed $c_ent
   */
  public function setCEnt($c_ent) {
    $this->c_ent = $c_ent;
  }

  /**
   * @return mixed
   */
  public function getCn8() {
    return $this->cn8;
  }

  /**
   * @param mixed $cn8
   */
  public function setCn8($cn8) {
    $this->cn8 = $cn8;
  }

  /**
   * @return mixed
   */
  public function getIvalot() {
    return $this->ivalot;
  }

  /**
   * @param mixed $ivalot
   */
  public function setIvalot($ivalot) {
    $this->ivalot = $ivalot;
  }

  /**
   * @return mixed
   */
  public function getArtant() {
    return $this->artant;
  }

  /**
   * @param mixed $artant
   */
  public function setArtant($artant) {
    $this->artant = $artant;
  }

  /**
   * @return mixed
   */
  public function getReportetiq() {
    return $this->reportetiq;
  }

  /**
   * @param mixed $reportetiq
   */
  public function setReportetiq($reportetiq) {
    $this->reportetiq = $reportetiq;
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
  public function getDto1() {
    return $this->dto1;
  }

  /**
   * @param mixed $dto1
   */
  public function setDto1($dto1) {
    $this->dto1 = $dto1;
  }

  /**
   * @return mixed
   */
  public function getDto2() {
    return $this->dto2;
  }

  /**
   * @param mixed $dto2
   */
  public function setDto2($dto2) {
    $this->dto2 = $dto2;
  }

  /**
   * @return mixed
   */
  public function getDto3() {
    return $this->dto3;
  }

  /**
   * @param mixed $dto3
   */
  public function setDto3($dto3) {
    $this->dto3 = $dto3;
  }



}