<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cliente;
use AppBundle\Form\ClienteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * @Security("is_granted('ROLE_USER')")
 * @Route("/clientes")
 */
class ClienteController extends Controller {

  /**
   * @Route("/clientes", name="clientes")
   */
  public function listAction() {

    $em = $this->getDoctrine()->getManager();

    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->findAll();

    return $this->render('clientes/lista_clientes.html.twig', [
      'clientes' => $clientes
    ]);

  }

  /**
   * @Route("/clientes/{codigo}", name="vista_cliente")
   */
  public function editAction(Request $request, Cliente $cliente) {
    $form = $this->createForm(ClienteFormType::class, $cliente);

    // only handles data on POST
    $form->handleRequest($request);


    if ($form->isSubmitted() && $form->isValid()) {

      $cliente = $form->getData();

      $em = $this->getDoctrine()->getManager();
      $em->persist($cliente);
      $em->flush();

      $this->addFlash('success', 'Cliente created!');

      return $this->redirectToRoute('clientes');
    }



    return $this->render('clientes/vista_cliente.html.twig', [
      'clienteForm' => $form->createView()
    ]);

  }


  ///**
  // * @Route("/clientes/{codigo_cliente}", name="vista_cliente")
  // */
  //public function showAction($codigo_cliente) {
  //
  //  $em = $this->getDoctrine()->getManager();
  //  $cliente = $em->getRepository('AppBundle:Cliente')
  //    ->findOneBy(['codigo' => $codigo_cliente]);
  //
  //  if (!$cliente) {
  //    throw $this->createNotFoundException('Cliente no Encontrado');
  //  }
  //
  //
  //  return $this->render('clientes/vista_cliente.html.twig', [
  //    'cliente' => $cliente
  //  ]);
  //}

}
