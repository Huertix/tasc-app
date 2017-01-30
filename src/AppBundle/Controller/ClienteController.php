<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ClienteController extends Controller
{



  /**
   * @Route("/clientes", name="clientes")
   */
  public function listAction()
  {
    $em = $this->getDoctrine()->getManager();

    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->findAll();

    return $this->render('clientes/lista_clientes.html.twig', [
      'clientes' => $clientes
    ]);

  }

  /**
   * @Route("/clientes/{codigo_cliente}", name="vista_cliente")
   */
  public function showAction($codigo_cliente) {

    $em = $this->getDoctrine()->getManager();
    $cliente = $em->getRepository('AppBundle:Cliente')
      ->findOneBy(['id' => $codigo_cliente]);

    if (!$cliente) {
      throw $this->createNotFoundException('Cliente no Encontrado');
    }


    return $this->render('clientes/vista_cliente.html.twig', [
      'cliente' => $cliente
    ]);
  }

  /**
   * @Route("/futurosclientes", name="futuros_clientes")
   */
  public function futurosAction(Request $request)
  {

  }
}
