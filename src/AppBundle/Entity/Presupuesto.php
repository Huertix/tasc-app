<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="c_presuv")
 */
class Presupuesto {
  /**
   * @ORM\Column(type="string", length=25, options={"fixed" = true}, nullable=false)
   */
  private $usuario = 'TASCAPP';
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $empresa = '01';
  /**
   * @ORM\Id
   * @ORM\Column(type="utf8string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $numero;
  /**
   * @ORM\Column(type="datetime", nullable=false)
   */
  private $fecha;
  /**
   * @ORM\Column(name="cliente", type="string", length=10, nullable=false)
   */
  private $numero_cliente;
  /**
   * @ORM\ManyToOne(targetEntity="Cliente", inversedBy="presupuestos")
   * @ORM\JoinColumn(name="cliente", referencedColumnName="codigo")
   */
  private $cliente;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $env_cli = 1;
  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $entrega;
  /**
   * @ORM\Column(type="string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $nota = '';
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $vendedor;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $ruta = '';
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $pronto = 0.00;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $traspasado = 0;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $cancelado = 0;
  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $observacio = '';
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $iva_inc = 0;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $importe;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $futuro = 0;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $divisa = '000';
  /**
   * @ORM\Column(type="decimal", precision=20, scale=6, nullable=false)
   */
  private $cambio = 1.000000;
  /**
   * @ORM\Column(type="decimal", precision=15, scale=6, nullable=false)
   */
  private $impdivisa;
  /**
   * @ORM\Column(type="text", nullable=true)
   */
  private $fpag = '';
  /**
   * @ORM\Column(type="string", length=12, options={"fixed" = true}, nullable=false)
   */
  private $hora = '';
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $aceptado = 0;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $produccion = 0;
  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $servido;
  /**
   * @ORM\Column(type="datetime", nullable=true)
   */
  private $fechaacep;
  /**
  * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
  */
  private $peso = 0.0000;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $litros = 0.0000;
  /**
   * @ORM\Column(type="binary", nullable=true)
   */
  private $vista = 0;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $operario = '';
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $letra = '';
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $comms = 0;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $libre_1 = '';
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $libre_2 = '';
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $libre_3 = '';
  /**
   * @ORM\Column(type="string", length=5, options={"fixed" = true}, nullable=false)
   */
  private $obra = '';
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $impreso = 0;
  /**
   * @ORM\Column(type="binary", nullable=true)
   */
  private $traspejer = 0;
  /**
   * @ORM\Column(type="string", length=35, options={"fixed" = true}, nullable=false)
   */
  private $mandato = '';
  /**
   * @ORM\Column(type="string", length=1, options={"fixed" = true}, nullable=false)
   */
  private $modificado = '0';
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $clienteerp = '';
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $codpost = '';
  /**
   * @ORM\OneToMany(targetEntity="PresupuestoDetalles", mappedBy="presupuesto")
   */
  private $presupuesto_detalles;

  public function __construct()
  {
    $this->presupuesto_detalles = new ArrayCollection();
  }

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
  public function getFecha() {
    return $this->fecha;
  }

  /**
   * @param mixed $fecha
   */
  public function setFecha($fecha) {
    $this->fecha = $fecha;
  }

  /**
   * @return mixed
   */
  public function getNumeroCliente() {
    return $this->numero_cliente;
  }

  /**
   * @param mixed $numero_cliente
   */
  public function setNumeroCliente($numero_cliente) {
    $this->numero_cliente = $numero_cliente;
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
  public function getEnvCli() {
    return $this->env_cli;
  }

  /**
   * @param mixed $env_cli
   */
  public function setEnvCli($env_cli) {
    $this->env_cli = $env_cli;
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
  public function getNota() {
    return $this->nota;
  }

  /**
   * @param mixed $nota
   */
  public function setNota($nota) {
    $this->nota = $nota;
  }

  /**
   * @return mixed
   */
  public function getVendedor() {
    return $this->vendedor;
  }

  /**
   * @param mixed $vendedor
   */
  public function setVendedor($vendedor) {
    $this->vendedor = $vendedor;
  }

  /**
   * @return mixed
   */
  public function getRuta() {
    return $this->ruta;
  }

  /**
   * @param mixed $ruta
   */
  public function setRuta($ruta) {
    $this->ruta = $ruta;
  }

  /**
   * @return mixed
   */
  public function getPronto() {
    return $this->pronto;
  }

  /**
   * @param mixed $pronto
   */
  public function setPronto($pronto) {
    $this->pronto = $pronto;
  }

  /**
   * @return mixed
   */
  public function getTraspasado() {
    return $this->traspasado;
  }

  /**
   * @param mixed $traspasado
   */
  public function setTraspasado($traspasado) {
    $this->traspasado = $traspasado;
  }

  /**
   * @return mixed
   */
  public function getCancelado() {
    return $this->cancelado;
  }

  /**
   * @param mixed $cancelado
   */
  public function setCancelado($cancelado) {
    $this->cancelado = $cancelado;
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
  public function getFuturo() {
    return $this->futuro;
  }

  /**
   * @param mixed $futuro
   */
  public function setFuturo($futuro) {
    $this->futuro = $futuro;
  }

  /**
   * @return mixed
   */
  public function getDivisa() {
    return $this->divisa;
  }

  /**
   * @param mixed $divisa
   */
  public function setDivisa($divisa) {
    $this->divisa = $divisa;
  }

  /**
   * @return mixed
   */
  public function getCambio() {
    return $this->cambio;
  }

  /**
   * @param mixed $cambio
   */
  public function setCambio($cambio) {
    $this->cambio = $cambio;
  }

  /**
   * @return mixed
   */
  public function getImpdivisa() {
    return $this->impdivisa;
  }

  /**
   * @param mixed $impdivisa
   */
  public function setImpdivisa($impdivisa) {
    $this->impdivisa = $impdivisa;
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
  public function getHora() {
    return $this->hora;
  }

  /**
   * @param mixed $hora
   */
  public function setHora($hora) {
    $this->hora = $hora;
  }

  /**
   * @return mixed
   */
  public function getAceptado() {
    return $this->aceptado;
  }

  /**
   * @param mixed $aceptado
   */
  public function setAceptado($aceptado) {
    $this->aceptado = $aceptado;
  }

  /**
   * @return mixed
   */
  public function getProduccion() {
    return $this->produccion;
  }

  /**
   * @param mixed $produccion
   */
  public function setProduccion($produccion) {
    $this->produccion = $produccion;
  }

  /**
   * @return mixed
   */
  public function getServido() {
    return $this->servido;
  }

  /**
   * @param mixed $servido
   */
  public function setServido($servido) {
    $this->servido = $servido;
  }

  /**
   * @return mixed
   */
  public function getFechaacep() {
    return $this->fechaacep;
  }

  /**
   * @param mixed $fechaacep
   */
  public function setFechaacep($fechaacep) {
    $this->fechaacep = $fechaacep;
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
  public function getOperario() {
    return $this->operario;
  }

  /**
   * @param mixed $operario
   */
  public function setOperario($operario) {
    $this->operario = $operario;
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
  public function getComms() {
    return $this->comms;
  }

  /**
   * @param mixed $comms
   */
  public function setComms($comms) {
    $this->comms = $comms;
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
  public function getObra() {
    return $this->obra;
  }

  /**
   * @param mixed $obra
   */
  public function setObra($obra) {
    $this->obra = $obra;
  }

  /**
   * @return mixed
   */
  public function getImpreso() {
    return $this->impreso;
  }

  /**
   * @param mixed $impreso
   */
  public function setImpreso($impreso) {
    $this->impreso = $impreso;
  }

  /**
   * @return mixed
   */
  public function getTraspejer() {
    return $this->traspejer;
  }

  /**
   * @param mixed $traspejer
   */
  public function setTraspejer($traspejer) {
    $this->traspejer = $traspejer;
  }

  /**
   * @return mixed
   */
  public function getMandato() {
    return $this->mandato;
  }

  /**
   * @param mixed $mandato
   */
  public function setMandato($mandato) {
    $this->mandato = $mandato;
  }

  /**
   * @return mixed
   */
  public function getModificado() {
    return $this->modificado;
  }

  /**
   * @param mixed $modificado
   */
  public function setModificado($modificado) {
    $this->modificado = $modificado;
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
  public function getCodpost() {
    return $this->codpost;
  }

  /**
   * @param mixed $codpost
   */
  public function setCodpost($codpost) {
    $this->codpost = $codpost;
  }

  /**
   * @return mixed
   */
  public function getpresupuesto_detalles() {
    return $this->presupuesto_detalles;
  }

  /**
   * @param mixed $presupuesto_detalles
   */
  public function setPresupuestoDetalles($presupuesto_detalles) {
    $this->presupuesto_detalles = $presupuesto_detalles;
  }

}