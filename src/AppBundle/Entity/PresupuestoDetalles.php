<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="d_presuv")
 */
class PresupuestoDetalles {
  /**
   * @ORM\Column(type="string", length=25, options={"fixed" = true}, nullable=false)
   */
  private $usuario;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $empresa;
  /**
   * @ORM\Id
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $numero;
  /**
   * @ORM\Column(type="datetime")
   */
  private $entrega;
  /**
   * @ORM\Column(type="string", length=20, options={"fixed" = true}, nullable=false)
   */
  private $articulo;
  /**
   * @ORM\Column(type="string", length=75, options={"fixed" = true}, nullable=false)
   */
  private $definicion;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $unidades;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $precio;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $dto1;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $dto2;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $importe;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipo_iva;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $traspaso;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $servidas;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $coste;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $cuenta;
  /**
   * @ORM\Id
   * @ORM\Column(type="integer", nullable=false)
   */
  private $linia;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $cliente;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $precioiva;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $importeiva;
  /**
   * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
   */
  private $cajas;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $familia;
  /**
   * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
   */
  private $cajaserv;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $preciodiv;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $importediv;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $falta;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $peso;
  /**
   * @ORM\Column(type="binary")
   */
  private $vista;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $pverde;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $recarg;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $color;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $letra;
  /**
   * @ORM\Column(type="string", length=4, options={"fixed" = true}, nullable=false)
   */
  private $talla;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $impdiviva;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $prediviva;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $lote;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $libre_1;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $libre_2;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $libre_3;
  /**
   * @ORM\Column(type="string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $libre_4;
  /**
   * @ORM\Column(type="string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $libre_5;
  /**
   * @ORM\Column(type="string", length=20, options={"fixed" = true}, nullable=false)
   */
  private $asi;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $ide;
  /**
   * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
   */
  private $dias;
  /**
   * @ORM\Column(type="string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $escandal;
  /**
   * @ORM\Column(type="decimal", precision=1, scale=0, nullable=false)
   */
  private $tipoprec;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipo_ivav;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipo_art;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $unimedida;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $premedida;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $clienteerp;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $codagrup;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $uniagrup;

  /**
   * @return mixed
   */
  public function getUsuario() {
    return $this->usuario;
  }

  /**
   * @param mixed $usuario
   */
  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }

  /**
   * @return mixed
   */
  public function getEmpresa() {
    return $this->empresa;
  }

  /**
   * @param mixed $empresa
   */
  public function setEmpresa($empresa) {
    $this->empresa = $empresa;
  }

  /**
   * @return mixed
   */
  public function getNumero() {
    return $this->numero;
  }

  /**
   * @param mixed $numero
   */
  public function setNumero($numero) {
    $this->numero = $numero;
  }

  /**
   * @return mixed
   */
  public function getEntrega() {
    return $this->entrega;
  }

  /**
   * @param mixed $entrega
   */
  public function setEntrega($entrega) {
    $this->entrega = $entrega;
  }

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
  public function getDefinicion() {
    return $this->definicion;
  }

  /**
   * @param mixed $definicion
   */
  public function setDefinicion($definicion) {
    $this->definicion = $definicion;
  }

  /**
   * @return mixed
   */
  public function getUnidades() {
    return $this->unidades;
  }

  /**
   * @param mixed $unidades
   */
  public function setUnidades($unidades) {
    $this->unidades = $unidades;
  }

  /**
   * @return mixed
   */
  public function getPrecio() {
    return $this->precio;
  }

  /**
   * @param mixed $precio
   */
  public function setPrecio($precio) {
    $this->precio = $precio;
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
  public function getImporte() {
    return $this->importe;
  }

  /**
   * @param mixed $importe
   */
  public function setImporte($importe) {
    $this->importe = $importe;
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
  public function getTraspaso() {
    return $this->traspaso;
  }

  /**
   * @param mixed $traspaso
   */
  public function setTraspaso($traspaso) {
    $this->traspaso = $traspaso;
  }

  /**
   * @return mixed
   */
  public function getServidas() {
    return $this->servidas;
  }

  /**
   * @param mixed $servidas
   */
  public function setServidas($servidas) {
    $this->servidas = $servidas;
  }

  /**
   * @return mixed
   */
  public function getCoste() {
    return $this->coste;
  }

  /**
   * @param mixed $coste
   */
  public function setCoste($coste) {
    $this->coste = $coste;
  }

  /**
   * @return mixed
   */
  public function getCuenta() {
    return $this->cuenta;
  }

  /**
   * @param mixed $cuenta
   */
  public function setCuenta($cuenta) {
    $this->cuenta = $cuenta;
  }

  /**
   * @return mixed
   */
  public function getLinia() {
    return $this->linia;
  }

  /**
   * @param mixed $linia
   */
  public function setLinia($linia) {
    $this->linia = $linia;
  }

  /**
   * @return mixed
   */
  public function getCliente() {
    return $this->cliente;
  }

  /**
   * @param mixed $cliente
   */
  public function setCliente($cliente) {
    $this->cliente = $cliente;
  }

  /**
   * @return mixed
   */
  public function getPrecioiva() {
    return $this->precioiva;
  }

  /**
   * @param mixed $precioiva
   */
  public function setPrecioiva($precioiva) {
    $this->precioiva = $precioiva;
  }

  /**
   * @return mixed
   */
  public function getImporteiva() {
    return $this->importeiva;
  }

  /**
   * @param mixed $importeiva
   */
  public function setImporteiva($importeiva) {
    $this->importeiva = $importeiva;
  }

  /**
   * @return mixed
   */
  public function getCajas() {
    return $this->cajas;
  }

  /**
   * @param mixed $cajas
   */
  public function setCajas($cajas) {
    $this->cajas = $cajas;
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
  public function getCajaserv() {
    return $this->cajaserv;
  }

  /**
   * @param mixed $cajaserv
   */
  public function setCajaserv($cajaserv) {
    $this->cajaserv = $cajaserv;
  }

  /**
   * @return mixed
   */
  public function getPreciodiv() {
    return $this->preciodiv;
  }

  /**
   * @param mixed $preciodiv
   */
  public function setPreciodiv($preciodiv) {
    $this->preciodiv = $preciodiv;
  }

  /**
   * @return mixed
   */
  public function getImportediv() {
    return $this->importediv;
  }

  /**
   * @param mixed $importediv
   */
  public function setImportediv($importediv) {
    $this->importediv = $importediv;
  }

  /**
   * @return mixed
   */
  public function getFalta() {
    return $this->falta;
  }

  /**
   * @param mixed $falta
   */
  public function setFalta($falta) {
    $this->falta = $falta;
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
  public function getRecarg() {
    return $this->recarg;
  }

  /**
   * @param mixed $recarg
   */
  public function setRecarg($recarg) {
    $this->recarg = $recarg;
  }

  /**
   * @return mixed
   */
  public function getColor() {
    return $this->color;
  }

  /**
   * @param mixed $color
   */
  public function setColor($color) {
    $this->color = $color;
  }

  /**
   * @return mixed
   */
  public function getLetra() {
    return $this->letra;
  }

  /**
   * @param mixed $letra
   */
  public function setLetra($letra) {
    $this->letra = $letra;
  }

  /**
   * @return mixed
   */
  public function getTalla() {
    return $this->talla;
  }

  /**
   * @param mixed $talla
   */
  public function setTalla($talla) {
    $this->talla = $talla;
  }

  /**
   * @return mixed
   */
  public function getImpdiviva() {
    return $this->impdiviva;
  }

  /**
   * @param mixed $impdiviva
   */
  public function setImpdiviva($impdiviva) {
    $this->impdiviva = $impdiviva;
  }

  /**
   * @return mixed
   */
  public function getPrediviva() {
    return $this->prediviva;
  }

  /**
   * @param mixed $prediviva
   */
  public function setPrediviva($prediviva) {
    $this->prediviva = $prediviva;
  }

  /**
   * @return mixed
   */
  public function getLote() {
    return $this->lote;
  }

  /**
   * @param mixed $lote
   */
  public function setLote($lote) {
    $this->lote = $lote;
  }

  /**
   * @return mixed
   */
  public function getLibre1() {
    return $this->libre_1;
  }

  /**
   * @param mixed $libre_1
   */
  public function setLibre1($libre_1) {
    $this->libre_1 = $libre_1;
  }

  /**
   * @return mixed
   */
  public function getLibre2() {
    return $this->libre_2;
  }

  /**
   * @param mixed $libre_2
   */
  public function setLibre2($libre_2) {
    $this->libre_2 = $libre_2;
  }

  /**
   * @return mixed
   */
  public function getLibre3() {
    return $this->libre_3;
  }

  /**
   * @param mixed $libre_3
   */
  public function setLibre3($libre_3) {
    $this->libre_3 = $libre_3;
  }

  /**
   * @return mixed
   */
  public function getLibre4() {
    return $this->libre_4;
  }

  /**
   * @param mixed $libre_4
   */
  public function setLibre4($libre_4) {
    $this->libre_4 = $libre_4;
  }

  /**
   * @return mixed
   */
  public function getLibre5() {
    return $this->libre_5;
  }

  /**
   * @param mixed $libre_5
   */
  public function setLibre5($libre_5) {
    $this->libre_5 = $libre_5;
  }

  /**
   * @return mixed
   */
  public function getAsi() {
    return $this->asi;
  }

  /**
   * @param mixed $asi
   */
  public function setAsi($asi) {
    $this->asi = $asi;
  }

  /**
   * @return mixed
   */
  public function getIde() {
    return $this->ide;
  }

  /**
   * @param mixed $ide
   */
  public function setIde($ide) {
    $this->ide = $ide;
  }

  /**
   * @return mixed
   */
  public function getDias() {
    return $this->dias;
  }

  /**
   * @param mixed $dias
   */
  public function setDias($dias) {
    $this->dias = $dias;
  }

  /**
   * @return mixed
   */
  public function getEscandal() {
    return $this->escandal;
  }

  /**
   * @param mixed $escandal
   */
  public function setEscandal($escandal) {
    $this->escandal = $escandal;
  }

  /**
   * @return mixed
   */
  public function getTipoprec() {
    return $this->tipoprec;
  }

  /**
   * @param mixed $tipoprec
   */
  public function setTipoprec($tipoprec) {
    $this->tipoprec = $tipoprec;
  }

  /**
   * @return mixed
   */
  public function getTipoIvav() {
    return $this->tipo_ivav;
  }

  /**
   * @param mixed $tipo_ivav
   */
  public function setTipoIvav($tipo_ivav) {
    $this->tipo_ivav = $tipo_ivav;
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
  public function getUnimedida() {
    return $this->unimedida;
  }

  /**
   * @param mixed $unimedida
   */
  public function setUnimedida($unimedida) {
    $this->unimedida = $unimedida;
  }

  /**
   * @return mixed
   */
  public function getPremedida() {
    return $this->premedida;
  }

  /**
   * @param mixed $premedida
   */
  public function setPremedida($premedida) {
    $this->premedida = $premedida;
  }

  /**
   * @return mixed
   */
  public function getClienteerp() {
    return $this->clienteerp;
  }

  /**
   * @param mixed $clienteerp
   */
  public function setClienteerp($clienteerp) {
    $this->clienteerp = $clienteerp;
  }

  /**
   * @return mixed
   */
  public function getCodagrup() {
    return $this->codagrup;
  }

  /**
   * @param mixed $codagrup
   */
  public function setCodagrup($codagrup) {
    $this->codagrup = $codagrup;
  }

  /**
   * @return mixed
   */
  public function getUniagrup() {
    return $this->uniagrup;
  }

  /**
   * @param mixed $uniagrup
   */
  public function setUniagrup($uniagrup) {
    $this->uniagrup = $uniagrup;
  }


}