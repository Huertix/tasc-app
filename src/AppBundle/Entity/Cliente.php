<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="clientes")
 */
class Cliente
{
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true, "default"=""}, nullable=false)
   */
  private $lin_des;
  /**
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   * @ORM\Column(type="utf8string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $codigo;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $cif;
  /**
   * @ORM\Column(type="utf8string", length=80, options={"fixed" = true,}, nullable=false)
   */
  private $nombre;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $nombre2;
  /**
   * @ORM\Column(type="utf8string", length=80, options={"fixed" = true, "default"=""}, nullable=false)
   */
  private $direccion;
  /**
   * @ORM\Column(type="utf8string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $codpost;
  /**
   * @ORM\Column(type="utf8string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $poblacion;
  /**
   * @ORM\Column(type="utf8string", length=30, options={"fixed" = true}, nullable=false)
   */
  private $provincia;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true, "default"="034"}, nullable=false)
   */
  private $pais;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true, "default"=""}, nullable=false)
   */
  private $ruta;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $vendedor;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true, "default"="01"}, nullable=false)
   */
  private $tarifa;
  /**
   * @ORM\Column(type="binary", options={"default"=false}, nullable=false)
   */
  private $valor_alb;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipofac;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $copia_fra;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $idioma;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=4, nullable=false)
   */
  private $credito;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $descu1;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $descu2;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=2, nullable=false)
   */
  private $pronto;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $diapag;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $diapag2;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $fpag;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipo_iva;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $recargo;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $comunitari;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $retencion;
  /**
   * @ORM\Column(type="binary",nullable=false)
   */
  private $modo_ret;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $tipo_ret;
  /**
   * @ORM\Column(type="string")
   */
  private $observacio;
  /**
   * @ORM\Column(type="string", length=60, options={"fixed" = true}, nullable=false)
   */
  private $email;
  /**
   * @ORM\Column(type="string", length=60, options={"fixed" = true}, nullable=false)
   */
  private $http;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $refundir;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $env_cli;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $albafra;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $csb;
  /**
   * @ORM\Column(type="string", length=2, options={"fixed" = true}, nullable=false)
   */
  private $cia_cred;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $operacio;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $idioma_imp;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $agencia;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $bloq_ven;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $lim_mon;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $portes;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $portcomp;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $vista;
  /**
   * @ORM\Column(type="datetime")
   */
  private $f_alta;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $oferta;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $bloq_cli;
  /**
   * @ORM\Column(type="datetime", nullable=false)
   */
  private $fecha_baj;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $contrapar;
  /**
   * @ORM\Column(type="string", length=4, options={"fixed" = true}, nullable=false)
   */
  private $zona;
  /**
   * @ORM\Column(type="decimal", precision=6, scale=0, nullable=false)
   */
  private $posicion;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $mensaje;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $pregvac;
  /**
   * @ORM\Column(type="decimal", precision=6, scale=0, nullable=false)
   */
  private $valportes;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $fraped;
  /**
   * @ORM\Column(type="decimal", precision=6, scale=0, nullable=false)
   */
  private $val_punt;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $contado;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $c_ent;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia1;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia2;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia3;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia4;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia5;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia6;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $dia7;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $es_grupo;
  /**
   * @ORM\Column(type="string", length=8, options={"fixed" = true}, nullable=false)
   */
  private $clifinal;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $pverde;
  /**
   * @ORM\Column(type="string", length=3, options={"fixed" = true}, nullable=false)
   */
  private $tipcredit;
  /**
   * @ORM\Column(type="decimal", precision=20, scale=3, nullable=false)
   */
  private $recarfin;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $retnofisc;
  /**
   * @ORM\Column(type="decimal", precision=10, scale=2, nullable=false)
   */
  private $tpcretnofi;
  /**
   * @ORM\Column(type="string", length=80, options={"fixed" = true}, nullable=false)
   */
  private $libre1;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $modretnofi;
  /**
   * @ORM\Column(type="string", length=60, options={"fixed" = true}, nullable=false)
   */
  private $email_f;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $tipo_cli;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $fraesi;
  /**
   * @ORM\Column(type="string", length=1, options={"fixed" = true}, nullable=false)
   */
  private $autotipdoc;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $bloqalbvta;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $bloqpedvta;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $bloqprevta;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $bloqdepvta;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $nocomusms;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $nocomuema;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $nocomucar;
  /**
   * @ORM\Column(type="datetime")
   */
  private $fbloqnosms;
  /**
   * @ORM\Column(type="datetime")
   */
  private $fbloqnoema;
  /**
   * @ORM\Column(type="datetime")
   */
  private $fbloqnocar;
  /**
   * @ORM\Column(type="string", nullable=false)
   */
  private $nocomuobs;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $regcaja;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $guid;
  /**
   * @ORM\Column(type="datetime")
   */
  private $exportar;
  /**
   * @ORM\Column(type="datetime")
   */
  private $importar;
  /**
   * @ORM\Column(type="binary", nullable=false)
   */
  private $recc;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $clienteerp;
  /**
   * @ORM\Column(type="string", length=15, options={"fixed" = true}, nullable=false)
   */
  private $ctaerp;
  /**
   * @ORM\Column(type="string", length=40, options={"fixed" = true}, nullable=false)
   */
  private $nombre3erp;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $poblacerp;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $provinerp;
  /**
   * @ORM\Column(type="integer", nullable=false)
   */
  private $territerp;
  /**
   * @ORM\Column(type="string", length=40, options={"fixed" = true}, nullable=false)
   */
  private $direcc2erp;
  /**
   * @ORM\Column(type="string", length=10, options={"fixed" = true}, nullable=false)
   */
  private $delegerp;
  /**
   * @ORM\Column(type="string", length=50, options={"fixed" = true}, nullable=false)
   */
  private $guid_exp;
  /**
   * @ORM\OneToMany(targetEntity="Presupuesto", mappedBy="cliente")
   */
  private $presupuestos;

  public function __construct()
  {
    $this->presupuestos = new ArrayCollection();
  }


  /**
   * @return mixed
   */
  public function getLinDes() {
    return $this->lin_des;
  }

  /**
   * @param mixed $lin_des
   */
  public function setLinDes($lin_des) {
    $this->lin_des = $lin_des;
  }

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
  public function getCif() {
    return $this->cif;
  }

  /**
   * @param mixed $cif
   */
  public function setCif($cif) {
    $this->cif = $cif;
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
  public function getDireccion() {
    return $this->direccion;
  }

  /**
   * @param mixed $direccion
   */
  public function setDireccion($direccion) {
    $this->direccion = $direccion;
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
  public function getPoblacion() {
    return $this->poblacion;
  }

  /**
   * @param mixed $poblacion
   */
  public function setPoblacion($poblacion) {
    $this->poblacion = $poblacion;
  }

  /**
   * @return mixed
   */
  public function getProvincia() {
    return $this->provincia;
  }

  /**
   * @param mixed $provincia
   */
  public function setProvincia($provincia) {
    $this->provincia = $provincia;
  }

  /**
   * @return mixed
   */
  public function getPais() {
    return $this->pais;
  }

  /**
   * @param mixed $pais
   */
  public function setPais($pais) {
    $this->pais = $pais;
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
  public function getTarifa() {
    return $this->tarifa;
  }

  /**
   * @param mixed $tarifa
   */
  public function setTarifa($tarifa) {
    $this->tarifa = $tarifa;
  }

  /**
   * @return mixed
   */
  public function getValorAlb() {
    return $this->valor_alb;
  }

  /**
   * @param mixed $valor_alb
   */
  public function setValorAlb($valor_alb) {
    $this->valor_alb = $valor_alb;
  }

  /**
   * @return mixed
   */
  public function getTipofac() {
    return $this->tipofac;
  }

  /**
   * @param mixed $tipofac
   */
  public function setTipofac($tipofac) {
    $this->tipofac = $tipofac;
  }

  /**
   * @return mixed
   */
  public function getCopiaFra() {
    return $this->copia_fra;
  }

  /**
   * @param mixed $copia_fra
   */
  public function setCopiaFra($copia_fra) {
    $this->copia_fra = $copia_fra;
  }

  /**
   * @return mixed
   */
  public function getIdioma() {
    return $this->idioma;
  }

  /**
   * @param mixed $idioma
   */
  public function setIdioma($idioma) {
    $this->idioma = $idioma;
  }

  /**
   * @return mixed
   */
  public function getCredito() {
    return $this->credito;
  }

  /**
   * @param mixed $credito
   */
  public function setCredito($credito) {
    $this->credito = $credito;
  }

  /**
   * @return mixed
   */
  public function getDescu1() {
    return $this->descu1;
  }

  /**
   * @param mixed $descu1
   */
  public function setDescu1($descu1) {
    $this->descu1 = $descu1;
  }

  /**
   * @return mixed
   */
  public function getDescu2() {
    return $this->descu2;
  }

  /**
   * @param mixed $descu2
   */
  public function setDescu2($descu2) {
    $this->descu2 = $descu2;
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
  public function getDiapag() {
    return $this->diapag;
  }

  /**
   * @param mixed $diapag
   */
  public function setDiapag($diapag) {
    $this->diapag = $diapag;
  }

  /**
   * @return mixed
   */
  public function getDiapag2() {
    return $this->diapag2;
  }

  /**
   * @param mixed $diapag2
   */
  public function setDiapag2($diapag2) {
    $this->diapag2 = $diapag2;
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
  public function getRecargo() {
    return $this->recargo;
  }

  /**
   * @param mixed $recargo
   */
  public function setRecargo($recargo) {
    $this->recargo = $recargo;
  }

  /**
   * @return mixed
   */
  public function getComunitari() {
    return $this->comunitari;
  }

  /**
   * @param mixed $comunitari
   */
  public function setComunitari($comunitari) {
    $this->comunitari = $comunitari;
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
  public function getModoRet() {
    return $this->modo_ret;
  }

  /**
   * @param mixed $modo_ret
   */
  public function setModoRet($modo_ret) {
    $this->modo_ret = $modo_ret;
  }

  /**
   * @return mixed
   */
  public function getTipoRet() {
    return $this->tipo_ret;
  }

  /**
   * @param mixed $tipo_ret
   */
  public function setTipoRet($tipo_ret) {
    $this->tipo_ret = $tipo_ret;
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
  public function getEmail() {
    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail($email) {
    $this->email = $email;
  }

  /**
   * @return mixed
   */
  public function getHttp() {
    return $this->http;
  }

  /**
   * @param mixed $http
   */
  public function setHttp($http) {
    $this->http = $http;
  }

  /**
   * @return mixed
   */
  public function getRefundir() {
    return $this->refundir;
  }

  /**
   * @param mixed $refundir
   */
  public function setRefundir($refundir) {
    $this->refundir = $refundir;
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
  public function getAlbafra() {
    return $this->albafra;
  }

  /**
   * @param mixed $albafra
   */
  public function setAlbafra($albafra) {
    $this->albafra = $albafra;
  }

  /**
   * @return mixed
   */
  public function getCsb() {
    return $this->csb;
  }

  /**
   * @param mixed $csb
   */
  public function setCsb($csb) {
    $this->csb = $csb;
  }

  /**
   * @return mixed
   */
  public function getCiaCred() {
    return $this->cia_cred;
  }

  /**
   * @param mixed $cia_cred
   */
  public function setCiaCred($cia_cred) {
    $this->cia_cred = $cia_cred;
  }

  /**
   * @return mixed
   */
  public function getOperacio() {
    return $this->operacio;
  }

  /**
   * @param mixed $operacio
   */
  public function setOperacio($operacio) {
    $this->operacio = $operacio;
  }

  /**
   * @return mixed
   */
  public function getIdiomaImp() {
    return $this->idioma_imp;
  }

  /**
   * @param mixed $idioma_imp
   */
  public function setIdiomaImp($idioma_imp) {
    $this->idioma_imp = $idioma_imp;
  }

  /**
   * @return mixed
   */
  public function getAgencia() {
    return $this->agencia;
  }

  /**
   * @param mixed $agencia
   */
  public function setAgencia($agencia) {
    $this->agencia = $agencia;
  }

  /**
   * @return mixed
   */
  public function getBloqVen() {
    return $this->bloq_ven;
  }

  /**
   * @param mixed $bloq_ven
   */
  public function setBloqVen($bloq_ven) {
    $this->bloq_ven = $bloq_ven;
  }

  /**
   * @return mixed
   */
  public function getLimMon() {
    return $this->lim_mon;
  }

  /**
   * @param mixed $lim_mon
   */
  public function setLimMon($lim_mon) {
    $this->lim_mon = $lim_mon;
  }

  /**
   * @return mixed
   */
  public function getPortes() {
    return $this->portes;
  }

  /**
   * @param mixed $portes
   */
  public function setPortes($portes) {
    $this->portes = $portes;
  }

  /**
   * @return mixed
   */
  public function getPortcomp() {
    return $this->portcomp;
  }

  /**
   * @param mixed $portcomp
   */
  public function setPortcomp($portcomp) {
    $this->portcomp = $portcomp;
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
  public function getFAlta() {
    return $this->f_alta;
  }

  /**
   * @param mixed $f_alta
   */
  public function setFAlta($f_alta) {
    $this->f_alta = $f_alta;
  }

  /**
   * @return mixed
   */
  public function getOferta() {
    return $this->oferta;
  }

  /**
   * @param mixed $oferta
   */
  public function setOferta($oferta) {
    $this->oferta = $oferta;
  }

  /**
   * @return mixed
   */
  public function getBloqCli() {
    return $this->bloq_cli;
  }

  /**
   * @param mixed $bloq_cli
   */
  public function setBloqCli($bloq_cli) {
    $this->bloq_cli = $bloq_cli;
  }

  /**
   * @return mixed
   */
  public function getFechaBaj() {
    return $this->fecha_baj;
  }

  /**
   * @param mixed $fecha_baj
   */
  public function setFechaBaj($fecha_baj) {
    $this->fecha_baj = $fecha_baj;
  }

  /**
   * @return mixed
   */
  public function getContrapar() {
    return $this->contrapar;
  }

  /**
   * @param mixed $contrapar
   */
  public function setContrapar($contrapar) {
    $this->contrapar = $contrapar;
  }

  /**
   * @return mixed
   */
  public function getZona() {
    return $this->zona;
  }

  /**
   * @param mixed $zona
   */
  public function setZona($zona) {
    $this->zona = $zona;
  }

  /**
   * @return mixed
   */
  public function getPosicion() {
    return $this->posicion;
  }

  /**
   * @param mixed $posicion
   */
  public function setPosicion($posicion) {
    $this->posicion = $posicion;
  }

  /**
   * @return mixed
   */
  public function getMensaje() {
    return $this->mensaje;
  }

  /**
   * @param mixed $mensaje
   */
  public function setMensaje($mensaje) {
    $this->mensaje = $mensaje;
  }

  /**
   * @return mixed
   */
  public function getPregvac() {
    return $this->pregvac;
  }

  /**
   * @param mixed $pregvac
   */
  public function setPregvac($pregvac) {
    $this->pregvac = $pregvac;
  }

  /**
   * @return mixed
   */
  public function getValportes() {
    return $this->valportes;
  }

  /**
   * @param mixed $valportes
   */
  public function setValportes($valportes) {
    $this->valportes = $valportes;
  }

  /**
   * @return mixed
   */
  public function getFraped() {
    return $this->fraped;
  }

  /**
   * @param mixed $fraped
   */
  public function setFraped($fraped) {
    $this->fraped = $fraped;
  }

  /**
   * @return mixed
   */
  public function getValPunt() {
    return $this->val_punt;
  }

  /**
   * @param mixed $val_punt
   */
  public function setValPunt($val_punt) {
    $this->val_punt = $val_punt;
  }

  /**
   * @return mixed
   */
  public function getContado() {
    return $this->contado;
  }

  /**
   * @param mixed $contado
   */
  public function setContado($contado) {
    $this->contado = $contado;
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
  public function getDia1() {
    return $this->dia1;
  }

  /**
   * @param mixed $dia1
   */
  public function setDia1($dia1) {
    $this->dia1 = $dia1;
  }

  /**
   * @return mixed
   */
  public function getDia2() {
    return $this->dia2;
  }

  /**
   * @param mixed $dia2
   */
  public function setDia2($dia2) {
    $this->dia2 = $dia2;
  }

  /**
   * @return mixed
   */
  public function getDia3() {
    return $this->dia3;
  }

  /**
   * @param mixed $dia3
   */
  public function setDia3($dia3) {
    $this->dia3 = $dia3;
  }

  /**
   * @return mixed
   */
  public function getDia4() {
    return $this->dia4;
  }

  /**
   * @param mixed $dia4
   */
  public function setDia4($dia4) {
    $this->dia4 = $dia4;
  }

  /**
   * @return mixed
   */
  public function getDia5() {
    return $this->dia5;
  }

  /**
   * @param mixed $dia5
   */
  public function setDia5($dia5) {
    $this->dia5 = $dia5;
  }

  /**
   * @return mixed
   */
  public function getDia6() {
    return $this->dia6;
  }

  /**
   * @param mixed $dia6
   */
  public function setDia6($dia6) {
    $this->dia6 = $dia6;
  }

  /**
   * @return mixed
   */
  public function getDia7() {
    return $this->dia7;
  }

  /**
   * @param mixed $dia7
   */
  public function setDia7($dia7) {
    $this->dia7 = $dia7;
  }

  /**
   * @return mixed
   */
  public function getEsGrupo() {
    return $this->es_grupo;
  }

  /**
   * @param mixed $es_grupo
   */
  public function setEsGrupo($es_grupo) {
    $this->es_grupo = $es_grupo;
  }

  /**
   * @return mixed
   */
  public function getClifinal() {
    return $this->clifinal;
  }

  /**
   * @param mixed $clifinal
   */
  public function setClifinal($clifinal) {
    $this->clifinal = $clifinal;
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
  public function getTipcredit() {
    return $this->tipcredit;
  }

  /**
   * @param mixed $tipcredit
   */
  public function setTipcredit($tipcredit) {
    $this->tipcredit = $tipcredit;
  }

  /**
   * @return mixed
   */
  public function getRecarfin() {
    return $this->recarfin;
  }

  /**
   * @param mixed $recarfin
   */
  public function setRecarfin($recarfin) {
    $this->recarfin = $recarfin;
  }

  /**
   * @return mixed
   */
  public function getRetnofisc() {
    return $this->retnofisc;
  }

  /**
   * @param mixed $retnofisc
   */
  public function setRetnofisc($retnofisc) {
    $this->retnofisc = $retnofisc;
  }

  /**
   * @return mixed
   */
  public function getTpcretnofi() {
    return $this->tpcretnofi;
  }

  /**
   * @param mixed $tpcretnofi
   */
  public function setTpcretnofi($tpcretnofi) {
    $this->tpcretnofi = $tpcretnofi;
  }

  /**
   * @return mixed
   */
  public function getLibre1() {
    return $this->libre1;
  }

  /**
   * @param mixed $libre1
   */
  public function setLibre1($libre1) {
    $this->libre1 = $libre1;
  }

  /**
   * @return mixed
   */
  public function getModretnofi() {
    return $this->modretnofi;
  }

  /**
   * @param mixed $modretnofi
   */
  public function setModretnofi($modretnofi) {
    $this->modretnofi = $modretnofi;
  }

  /**
   * @return mixed
   */
  public function getEmailF() {
    return $this->email_f;
  }

  /**
   * @param mixed $email_f
   */
  public function setEmailF($email_f) {
    $this->email_f = $email_f;
  }

  /**
   * @return mixed
   */
  public function getTipoCli() {
    return $this->tipo_cli;
  }

  /**
   * @param mixed $tipo_cli
   */
  public function setTipoCli($tipo_cli) {
    $this->tipo_cli = $tipo_cli;
  }

  /**
   * @return mixed
   */
  public function getFraesi() {
    return $this->fraesi;
  }

  /**
   * @param mixed $fraesi
   */
  public function setFraesi($fraesi) {
    $this->fraesi = $fraesi;
  }

  /**
   * @return mixed
   */
  public function getAutotipdoc() {
    return $this->autotipdoc;
  }

  /**
   * @param mixed $autotipdoc
   */
  public function setAutotipdoc($autotipdoc) {
    $this->autotipdoc = $autotipdoc;
  }

  /**
   * @return mixed
   */
  public function getBloqalbvta() {
    return $this->bloqalbvta;
  }

  /**
   * @param mixed $bloqalbvta
   */
  public function setBloqalbvta($bloqalbvta) {
    $this->bloqalbvta = $bloqalbvta;
  }

  /**
   * @return mixed
   */
  public function getBloqpedvta() {
    return $this->bloqpedvta;
  }

  /**
   * @param mixed $bloqpedvta
   */
  public function setBloqpedvta($bloqpedvta) {
    $this->bloqpedvta = $bloqpedvta;
  }

  /**
   * @return mixed
   */
  public function getBloqprevta() {
    return $this->bloqprevta;
  }

  /**
   * @param mixed $bloqprevta
   */
  public function setBloqprevta($bloqprevta) {
    $this->bloqprevta = $bloqprevta;
  }

  /**
   * @return mixed
   */
  public function getBloqdepvta() {
    return $this->bloqdepvta;
  }

  /**
   * @param mixed $bloqdepvta
   */
  public function setBloqdepvta($bloqdepvta) {
    $this->bloqdepvta = $bloqdepvta;
  }

  /**
   * @return mixed
   */
  public function getNocomusms() {
    return $this->nocomusms;
  }

  /**
   * @param mixed $nocomusms
   */
  public function setNocomusms($nocomusms) {
    $this->nocomusms = $nocomusms;
  }

  /**
   * @return mixed
   */
  public function getNocomuema() {
    return $this->nocomuema;
  }

  /**
   * @param mixed $nocomuema
   */
  public function setNocomuema($nocomuema) {
    $this->nocomuema = $nocomuema;
  }

  /**
   * @return mixed
   */
  public function getNocomucar() {
    return $this->nocomucar;
  }

  /**
   * @param mixed $nocomucar
   */
  public function setNocomucar($nocomucar) {
    $this->nocomucar = $nocomucar;
  }

  /**
   * @return mixed
   */
  public function getFbloqnosms() {
    return $this->fbloqnosms;
  }

  /**
   * @param mixed $fbloqnosms
   */
  public function setFbloqnosms($fbloqnosms) {
    $this->fbloqnosms = $fbloqnosms;
  }

  /**
   * @return mixed
   */
  public function getFbloqnoema() {
    return $this->fbloqnoema;
  }

  /**
   * @param mixed $fbloqnoema
   */
  public function setFbloqnoema($fbloqnoema) {
    $this->fbloqnoema = $fbloqnoema;
  }

  /**
   * @return mixed
   */
  public function getFbloqnocar() {
    return $this->fbloqnocar;
  }

  /**
   * @param mixed $fbloqnocar
   */
  public function setFbloqnocar($fbloqnocar) {
    $this->fbloqnocar = $fbloqnocar;
  }

  /**
   * @return mixed
   */
  public function getNocomuobs() {
    return $this->nocomuobs;
  }

  /**
   * @param mixed $nocomuobs
   */
  public function setNocomuobs($nocomuobs) {
    $this->nocomuobs = $nocomuobs;
  }

  /**
   * @return mixed
   */
  public function getRegcaja() {
    return $this->regcaja;
  }

  /**
   * @param mixed $regcaja
   */
  public function setRegcaja($regcaja) {
    $this->regcaja = $regcaja;
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
  public function getRecc() {
    return $this->recc;
  }

  /**
   * @param mixed $recc
   */
  public function setRecc($recc) {
    $this->recc = $recc;
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
  public function getCtaerp() {
    return $this->ctaerp;
  }

  /**
   * @param mixed $ctaerp
   */
  public function setCtaerp($ctaerp) {
    $this->ctaerp = $ctaerp;
  }

  /**
   * @return mixed
   */
  public function getNombre3erp() {
    return $this->nombre3erp;
  }

  /**
   * @param mixed $nombre3erp
   */
  public function setNombre3erp($nombre3erp) {
    $this->nombre3erp = $nombre3erp;
  }

  /**
   * @return mixed
   */
  public function getPoblacerp() {
    return $this->poblacerp;
  }

  /**
   * @param mixed $poblacerp
   */
  public function setPoblacerp($poblacerp) {
    $this->poblacerp = $poblacerp;
  }

  /**
   * @return mixed
   */
  public function getProvinerp() {
    return $this->provinerp;
  }

  /**
   * @param mixed $provinerp
   */
  public function setProvinerp($provinerp) {
    $this->provinerp = $provinerp;
  }

  /**
   * @return mixed
   */
  public function getTerriterp() {
    return $this->territerp;
  }

  /**
   * @param mixed $territerp
   */
  public function setTerriterp($territerp) {
    $this->territerp = $territerp;
  }

  /**
   * @return mixed
   */
  public function getDirecc2erp() {
    return $this->direcc2erp;
  }

  /**
   * @param mixed $direcc2erp
   */
  public function setDirecc2erp($direcc2erp) {
    $this->direcc2erp = $direcc2erp;
  }

  /**
   * @return mixed
   */
  public function getDelegerp() {
    return $this->delegerp;
  }

  /**
   * @param mixed $delegerp
   */
  public function setDelegerp($delegerp) {
    $this->delegerp = $delegerp;
  }

  /**
   * @return mixed
   */
  public function getGuidExp() {
    return $this->guid_exp;
  }

  /**
   * @param mixed $guid_exp
   */
  public function setGuidExp($guid_exp) {
    $this->guid_exp = $guid_exp;
  }

  /**
   * @return mixed
   */
  public function getPresupuestos() {
    return $this->presupuestos;
  }

  /**
   * @param mixed $presupuestos
   */
  public function setPresupuestos($presupuestos) {
    $this->presupuestos = $presupuestos;
  }

}