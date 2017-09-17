<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cliente;
use AppBundle\Form\ClienteFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;



/**
 * @Security("is_granted('ROLE_USER')")
 */
class ClienteController extends Controller {

  /**
   * @Route("/clientes", name="clientes")
   */
  public function listAction() {

    $em = $this->getDoctrine()->getManager();
    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->clientesOrderedByName();

    return $this->render('clientes/lista_clientes.html.twig', [
      'clientes' => $clientes
    ]);
  }

  /**
   * @Route("/api/clientes/{codigo_cliente}", name="api_clientes")
   */
  public function getAction($codigo_cliente) {

    $em = $this->getDoctrine()->getManager();
    $cli = $em->getRepository('AppBundle:Cliente')
      ->findOneBy([
        'codigo' => str_pad ( $codigo_cliente , 15 , $pad_string = " ", $pad_type = STR_PAD_RIGHT )
      ]);

    $cliente = [];

    $cliente[] = [
      'cliente' => $this->checkValue($cli->getCodigo()),
      'nombre' => $this->checkValue($cli->getNombre()),
      'cif' => $this->checkValue($cli->getCif()),
      'direccion' => $this->checkValue($cli->getDireccion()),
      'cp' => $this->checkValue($cli->getCodpost()),
      'poblacion' => $this->checkValue($cli->getPoblacion()),
      'provincia' => $this->checkValue($cli->getProvincia()),
      'credito' => $this->checkValue($cli->getCredito()),
    ];

    $data = [
      'cliente' => $cliente
    ];

    return new JsonResponse($data);
  }

  ///**
  // * @Route("/clientes/nuevo", name="nuevo_cliente")
  // */
  //public function newAction(Request $request) {
  //
  //
  //  $cliente = new Cliente();
  //
  //  $cliente->setCodigo($this->get_next_cliente_number());
  //  $cliente->setNombre('');
  //  $cliente->setNombre2('');
  //  $cliente->setCif('');
  //  $cliente->setDireccion('');
  //  $cliente->setCodpost('');
  //  $cliente->setPoblacion('');
  //  $cliente->setProvincia('');
  //  $cliente->setPais('');
  //  $cliente->setVendedor('03');
  //  $cliente->setTipofac('05');
  //  $cliente->setCredito('0');
  //  $cliente->setDescu1('0');
  //  $cliente->setTipoIva('21');
  //  $cliente->setEmail('');
  //  $cliente->setObservacio('');
  //  $dtz = new \DateTimeZone("Europe/Madrid"); //Your timezone
  //  $now = new \DateTime(date("Y-m-d H:i:s"), $dtz);
  //  $cliente->setFAlta($now);
  //  $cliente->setPresupuestos(array());
  //
  //  var_dump($cliente);
  //  die();
  //
  //  $em = $this->getDoctrine()->getManager();
  //  $em->persist($cliente);
  //  $em->flush();
  //
  //
  //}

  /**
   * @Route("/clientes/{codigo}", name="vista_cliente")
   */
  public function editAction(Request $request, Cliente $cliente) {
    $form = $this->createForm(ClienteFormType::class, $cliente);

    // only handles data on POST
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      $cliente = $form->getData();

      if (!$this->validate_cliente_form($cliente)) {
        $this->addFlash('error', 'Formulario Tiene Parametros Erroneos o Incompletos');
        return $this->render('clientes/vista_cliente.html.twig', [
          'clienteForm' => $form->createView()
        ]);
      }

      $em = $this->getDoctrine()->getManager();
      $em->persist($cliente);
      $em->flush();
      $this->addFlash('success', 'Cliente "'. $cliente->getCodigo() .'" Guardado Correctamente!');
      return $this->redirectToRoute('clientes');
    }

    return $this->render('clientes/vista_cliente.html.twig', [
      'clienteForm' => $form->createView()
    ]);
  }
  
  //private function get_next_cliente_number() {
  //  $em = $this->getDoctrine()->getManager();
  //
  //  $clientes = $em->getRepository('AppBundle\Entity\Cliente')
  //    ->clientesOrderedByName();
  //
  //  $next_number = 0;
  //
  //  foreach ($clientes as $cliente) {
  //    $raw_number = trim($cliente->getCodigo());
  //    $number = '';
  //
  //    for ($i = 1; $i <= strlen($raw_number); $i++){
  //      $char = $raw_number[$i-1];
  //      if (is_numeric($char)) {
  //        $number = $number . $char;
  //      }
  //    }
  //
  //    $k = (int)$number;
  //    if ($next_number <= $k && $k < 43100000)  {
  //      $next_number = $k;
  //    }
  //  }
  //  $next_number = str_pad ( $next_number  + 1 , 15 , $pad_string = " ", $pad_type = STR_PAD_RIGHT );
  //  return $next_number;
  //}

  private function validate_cliente_form($cliente) {
    if (
      trim($cliente->getCodigo()) == '' ||
      trim($cliente->getNombre()) == '' ||
      trim($cliente->getCif())  == '' ||
      trim($cliente->getDireccion())  == '' ||
      trim($cliente->getPoblacion())  == '' ||
      trim($cliente->getProvincia())  == ''
    )
      return false;

    return true;
  }

  private function checkValue($value) {
    $value = trim($value);
    return $value != '' ? $value : '&nbsp';
  }
}
