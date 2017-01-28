<?php

namespace AppBundle\Controller;

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
   * @Route("/presupuestos/{numero_presupuesto}", name="vista_presupuesto")
   */
  public function showAction($numero_presupuesto) {

    $em = $this->getDoctrine()->getManager();
    $detalles_presupuesto = $em->getRepository('AppBundle:PresupuestoDetalles')
      ->findBy([
        'numero' => str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT )
      ]);



    if (!$detalles_presupuesto) {
      throw $this->createNotFoundException('Presupuesto no Encontrado');
    }


    return $this->render('presupuestos/vista_presupuesto.html.twig', [
      'detalles_presupuesto' => $detalles_presupuesto
    ]);
  }

}
