<?php

namespace AppBundle\Controller;

use AppBundle\Form\PresupuestoDetallesFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PresupuestoController extends Controller
{



  /**
   * @Route("/presupuestos", name="presupuestos")
   */
  public function listAction()
  {
    $em = $this->getDoctrine()->getManager();

    $presupuestos = $em->getRepository('AppBundle\Entity\Presupuesto')
      ->findAll();

    return $this->render('presupuestos/lista_presupuestos.html.twig', [
      'presupuestos' => $presupuestos
    ]);

  }

  /**
   * @Route("/presupuestos/nuevo", name="nuevo_presupuesto")
   */
  public function newAction() {

    $em = $this->getDoctrine()->getManager();

    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->findAll();

    $articulos = $em->getRepository('AppBundle\Entity\Articulo')
      ->findAll();

    return $this->render('presupuestos/nuevo_presupuesto.html.twig', [
      'clientes' => $clientes,
      'articulos' => $articulos
    ]);


  }

  /**
   * @Route("/presupuestos/{numero_presupuesto}", name="vista_presupuesto")
   */
  public function showAction($numero_presupuesto) {

    $em = $this->getDoctrine()->getManager();

    $presupuesto = $em->getRepository('AppBundle\Entity\Presupuesto')->findBy(
      array('numero' => str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT ))
    );

    $detalles_presupuesto = $em->getRepository('AppBundle:PresupuestoDetalles')
      ->findBy([
        'numero' => str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT )
      ]);

    //$array_form_detalles_presupuesto = [];
    //
    //foreach ($detalles_presupuesto as $detalle){
    //  $array_form_detalles_presupuesto[] = $this->createForm(PresupuestoDetallesFormType::class, $detalle);
    //}

    //$cliente = $presupuesto->getCliente();

    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->findAll();

    $articulos = $em->getRepository('AppBundle\Entity\Articulo')
      ->findAll();


    if (!$detalles_presupuesto) {
      throw $this->createNotFoundException('Presupuesto no Encontrado');
    }


    return $this->render('presupuestos/vista_presupuesto.html.twig', [
      'presupuesto' => $presupuesto,
      'detalles_presupuesto' => $detalles_presupuesto,
      //'cliente' => $cliente,
      'clientes' => $clientes,
      'articulos' => $articulos
    ]);

    //TODO: Check transpasado for prespuesto modifications
  }
}
