<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Presupuesto;
use AppBundle\Entity\PresupuestoDetalles;
use AppBundle\Form\PresupuestoDetallesFormType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Finder\Finder;

use iio\libmergepdf\Merger;
use iio\libmergepdf\Pages;

class PresupuestoController extends Controller
{

  private static $IVA = 21;

  /**
   * @Route("/presupuestos", name="listado_presupuestos")
   */
  public function listAction()
  {
    $em = $this->getDoctrine()->getManager();

    $presupuestos = $em->getRepository('AppBundle\Entity\Presupuesto')
      ->presupuestosOrderedByDate();

    foreach ($presupuestos as $presupuesto) {
      $cliente = $em->getRepository('AppBundle:Cliente')
        ->findOneBy([
          'codigo' => $presupuesto->getCliente()
        ]);
      $presupuesto->setCliente($cliente);

    }

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
      ->clientesOrderedByName();

    $articulos = $em->getRepository('AppBundle\Entity\Articulo')
      ->findAll();

    $count = 0;
    foreach ($articulos as $articulo) {
      if ($articulo->getPvp() == null)
        unset($articulos[$count]);
      $count++;
    }

    $familias = $em->getRepository('AppBundle\Entity\Familia')
      ->findAll();

    $marcas = $em->getRepository('AppBundle\Entity\Marca')
      ->findAll();

    return $this->render('presupuestos/nuevo_presupuesto.html.twig', [
      'clientes' => $clientes,
      'articulos' => $articulos,
      'familias' => $familias,
      'marcas' => $marcas
    ]);


  }

  /**
   * @Route("/presupuestos/clonar/{numero_presupuesto}", name="clonar_presupuesto")
   */
  public function clonAction($numero_presupuesto) {

    $em = $this->getDoctrine()->getManager();

    $presupuesto = $em->getRepository('AppBundle\Entity\Presupuesto')->findOneBy(
      array('numero' => str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT ))
    );

    $detalles_presupuesto = $presupuesto->getpresupuesto_detalles();

    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->clientesOrderedByName();

    $articulos = $em->getRepository('AppBundle\Entity\Articulo')
      ->findAll();

    $familias = $em->getRepository('AppBundle\Entity\Familia')
      ->findAll();

    $marcas = $em->getRepository('AppBundle\Entity\Marca')
      ->findAll();

    $count = 0;
    foreach ($articulos as $articulo) {
      if ($articulo->getPvp() == null)
        unset($articulos[$count]);
      $count++;
    }


    if (!$detalles_presupuesto) {
      throw $this->createNotFoundException('Presupuesto no Encontrado');
    }

    return $this->render('presupuestos/clonar_presupuesto.html.twig', [
      'clientes' => $clientes,
      'presupuesto' => $presupuesto,
      'detalles_presupuesto' => $detalles_presupuesto,
      'articulos' => $articulos,
      'familias' => $familias,
      'marcas' => $marcas,
    ]);


  }

  /**
   * @Route("/presupuestos/modificar/{numero_presupuesto}", name="modificar_presupuesto")
   */
  public function modifAction($numero_presupuesto) {

    $em = $this->getDoctrine()->getManager();

    $presupuesto = $em->getRepository('AppBundle\Entity\Presupuesto')->findOneBy(
      array('numero' => str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT ))
    );

    //if ($presupuesto->getTraspasado()) {
    //  $this->addFlash('error', 'El presupuesto ' . $numero_presupuesto .' ha sido transpasado');
    //  return $this->redirect($this->generateUrl('vista_presupuesto', array('numero_presupuesto' => $numero_presupuesto)), 301);
    //}

    ////TODO: Get new presupuesto modificado number
    $next_numero = $this->get_next_presupuesto_modificado_number($numero_presupuesto);

    if ($next_numero == null) {
      $this->addFlash('success', 'Se ha llegado al limite de modificaciones del presupuesto ');
      $this->redirect($numero_presupuesto);
      $url = $this->generateUrl("vista_presupuesto", array("numero_presupuesto" => $numero_presupuesto));
      return $this->redirect($url);

    } else {
      $numero_presupuesto = $next_numero;
    }

    $detalles_presupuesto = $presupuesto->getpresupuesto_detalles();
    
    $articulos = $em->getRepository('AppBundle\Entity\Articulo')
      ->findAll();

    $familias = $em->getRepository('AppBundle\Entity\Familia')
      ->findAll();

    $marcas = $em->getRepository('AppBundle\Entity\Marca')
      ->findAll();

    $count = 0;
    foreach ($articulos as $articulo) {
      if ($articulo->getPvp() == null)
        unset($articulos[$count]);
      $count++;
    }


    if (!$detalles_presupuesto) {
      throw $this->createNotFoundException('Presupuesto no Encontrado');
    }

    return $this->render('presupuestos/modificar_presupuesto.html.twig', [
      'presupuesto' => $presupuesto,
      'detalles_presupuesto' => $detalles_presupuesto,
      'numero_presupuesto' => $numero_presupuesto,
      'articulos' => $articulos,
      'familias' => $familias,
      'marcas' => $marcas,
    ]);


  }

  /**
   * @Route("/presupuestos/{numero_presupuesto}", name="vista_presupuesto")
   */
  public function showAction($numero_presupuesto) {

    $em = $this->getDoctrine()->getManager();

    $presupuesto = $em->getRepository('AppBundle\Entity\Presupuesto')->findOneBy(
      array('numero' => str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT ))
    );

    $detalles_presupuesto = $presupuesto->getpresupuesto_detalles();

    if (!$detalles_presupuesto) {
      throw $this->createNotFoundException('Presupuesto no Encontrado');
    }

    return $this->render('presupuestos/vista_presupuesto.html.twig', [
      'presupuesto' => $presupuesto,
      'detalles_presupuesto' => $detalles_presupuesto,
    ]);

  }

  /**
   * @Route("api/presupuestos/save", name="save_presupuesto")
   */
  public function saveAction(Request $request) {

    $em = $this->getDoctrine()->getManager();

    $parametersAsArray = [];

    if ($content = $request->getContent()) {
      $parametersAsArray = json_decode($content, true);
    }


    try {

      $cliente = $em->getRepository('AppBundle:Cliente')
        ->findOneBy([
          'codigo' => str_pad ( $parametersAsArray["cliente"] , 15 , $pad_string = " ", $pad_type = STR_PAD_RIGHT )
        ]);

      if (strpos($request->headers->get('referer'), 'modificar' )) {
        $number = explode( '/', $request->headers->get('referer'));
        $number = $number[sizeof($number) - 1];
        $numero_presupuesto = $this->get_next_presupuesto_modificado_number($number);
      }
      else
        $numero_presupuesto = $this->get_next_presupuesto_number();

      $numero_presupuesto = str_pad ( $numero_presupuesto , 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT );

      $c_presup = new Presupuesto();
      $c_presup->setNumero($numero_presupuesto);
      $date = new \DateTime($parametersAsArray["fecha"]);
      $c_presup->setFecha($date);
      $c_presup->setFechaacep($date);
      $c_presup->setNumeroCliente($parametersAsArray["cliente"]);
      $c_presup->setCliente($cliente);
      $c_presup->setVendedor($this->getUser()->getCodigo());
      $c_presup->setImporte($parametersAsArray["importe"]);
      $c_presup->setImpdivisa($parametersAsArray["importe"]);

      $em->persist($c_presup);
      $em->flush();

      $rows = $parametersAsArray["rows"];

      foreach ($rows as $row) {
          $d_presup = new PresupuestoDetalles();

          $d_presup->setNumero($numero_presupuesto);
          $d_presup->setDefinicion($row['definicion']);
          $d_presup->setLinia(intval($row['linia']));
          $d_presup->setCliente($parametersAsArray["cliente"]);
          $d_presup->setPresupuesto($c_presup);

          if (array_key_exists("articulo", $row)){
            $d_presup->setTipoIva((string) self::$IVA);
            $d_presup->setArticulo($row['articulo']);
            $d_presup->setUnidades(floatval($row['unidades']));
            $d_presup->setPrecio(floatval($row['precio']));
            $d_presup->setDto1(floatval($row['dto']));
            $d_presup->setImporte(floatval($row['importe']));
            $d_presup->setCoste(floatval($row['coste']));

            $precio = floatval($row['precio']);
            $precio_iva = ($precio * self::$IVA) / 100;
            $d_presup->setPrecioiva($precio + $precio_iva);
            $d_presup->setPrediviva($precio + $precio_iva);

            $importe = floatval($row['importe']);
            $imporet_iva = ($importe * self::$IVA) / 100;
            $d_presup->setImporteiva($importe + $imporet_iva);
            $d_presup->setImpdiviva($importe + $imporet_iva);

            $d_presup->setPreciodiv(floatval($row['precio']));
            $d_presup->setImportediv(floatval($row['importe']));

          }

        $em->persist($d_presup);
        $em->flush();
      }

      $this->addFlash('success', 'El presupuesto ' . $numero_presupuesto .' se ha guardado correctamente');

      $response_array = [
        "sucess" => True,
        "message" => "Presupuesto saved",
        "presupuesto" => trim($numero_presupuesto)
      ];

    } catch (\Exception $e) {
      switch (get_class($e)) {
        case 'Doctrine\DBAL\DBALException':
          $response_array['succes'] = False;
          $response_array['message'] = "DBAL Error: " . $e->getMessage();
          break;
        case 'Doctrine\DBA\DBAException':
          $response_array['succes'] = False;
          $response_array['message'] = "DBA Error: " . $e->getMessage();
          break;
        default:
          throw $e;
          break;
      }
    }

    return new JsonResponse($response_array);
  }

  /**
   * Export to PDF
   * http://blog.michaelperrin.fr/2016/02/17/generating-pdf-files-with-symfony/
   * @Route("/pdf/{numero_presupuesto}", name="presupuesto_pdf")
   */
  public function pdfAction($numero_presupuesto) {

    $path_pdf_tmp = $this->get('kernel')->getRootDir() . '/../web/pdf_tmp/';

    $this->recursiveRemoveDirectory($path_pdf_tmp);

    $em = $this->getDoctrine()->getManager();

    $presupuesto = $em->getRepository('AppBundle:Presupuesto')
      ->findOneBy([
        'numero' => str_pad ( $numero_presupuesto, 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT )
      ]);

    $cliente = $presupuesto->getCliente();
    $detalles_presupuesto = $presupuesto->getpresupuesto_detalles();

    $total_rows = $detalles_presupuesto->count();


    $count = 0;
    $pages_body_array = [];
    $sliced_array = [];
    foreach ($detalles_presupuesto as $row) {
      if( $count >= 54 ) {
        $pages_body_array[] = $sliced_array;
        $sliced_array = [];
        $count = 0;
      }
      else {
        $sliced_array[] = $row;
        $count++;
      }
    }

    array_push($pages_body_array, $sliced_array);
    $presupuesto_importe_base = 0;
    $presupuesto_importe_base = $presupuesto->getImporte();
    $presupuesto_importe_iva = 0;
    $presupuesto_importe_iva =  ($presupuesto_importe_base * self::$IVA) / 100;
    $presupuesto_importe_total = 0;
    $presupuesto_importe_total = $presupuesto_importe_base + $presupuesto_importe_iva;

    $current_page = 1;
    $total_pages = count($pages_body_array);

    foreach ($pages_body_array as $page_body) {

      $html = $this->renderView('presupuestos/pdf.html.twig', [
          'page_body' => $page_body,
          'cliente' => $cliente,
          'presupuesto' => $presupuesto,
          'presupuesto_importe_base' => $presupuesto_importe_base,
          'presupuesto_iva' => self::$IVA,
          'presupuesto_importe_iva' => $presupuesto_importe_iva,
          'presupuesto_importe_total' => $presupuesto_importe_total,
          'current_page' => $current_page,
          'total_pages' => $total_pages,
          'final_page' => $current_page == $total_pages,
      ]);

      $filename = sprintf('page-%s.pdf', $current_page++);

      $this->get('knp_snappy.pdf')->generateFromHtml(
        $html,
        $path_pdf_tmp . $filename
      );
    }
    

    $finder = new Finder();
    $finder->files()->in($path_pdf_tmp)->name('*.pdf')->sortByName();

    $m = new Merger();
    $m->addFinder($finder);

    $file_name = 'PR' . $numero_presupuesto . '.pdf';
    $file = $path_pdf_tmp . $file_name;

    try {

        file_put_contents($file, $m->merge());
        $pdf_file = file_get_contents($file);


        return new Response(
        $pdf_file,
        200,
        [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $file_name),
        ]
    );
    } catch(Exception $e) {
        $logger = $this->get('logger');
        $logger->error(sprintf('PDF Error: %s', $e));
    }
  
    
  }

  private function recursiveRemoveDirectory($directory) {
    foreach(glob("{$directory}/*") as $file)
    {
      if(is_dir($file)) {
        $this->recursiveRemoveDirectory($file);
      } else {
        unlink($file);
      }
    }
  }

  private function get_next_presupuesto_number() {

    $em = $this->getDoctrine()->getManager();

    $presupuestos = $em->getRepository('AppBundle\Entity\Presupuesto')
      ->findAll();

    $next_number = 0;

    foreach ($presupuestos as $presupuesto) {
      $raw_number = trim($presupuesto->getNumero());
      $number = '';

      for ($i = 1; $i <= strlen($raw_number); $i++){
        $char = $raw_number[$i-1];
        if (is_numeric($char)) {
          $number = $number . $char;
        }
      }

      $k = (int)$number;
      if ($next_number <= $k) {
        $next_number = $k;
      }
    }

    return $next_number  + 1;
  }

  private function get_next_presupuesto_modificado_number($numero_presupuesto) {

    $mod_char = [
      "A",
      "B",
      "C",
      "D",
      "E",
      "F",
      "G",
      "H",
      "I",
      "J",
      "K",
      "L",
      "M",
      "N",
      "O",
      "P",
      "Q",
      "R",
      "S",
      "T"
    ];

    $number = '';
    for ($i = 1; $i <= strlen($numero_presupuesto); $i++) {
      $digit = $numero_presupuesto[$i - 1];
      if (is_numeric($digit)) {
        $number = $number . $digit;
      }
    }


    $em = $this->getDoctrine()->getManager();

    $presupuestos = $em->getRepository('AppBundle\Entity\Presupuesto')
      ->createQueryBuilder('o')
      ->where('o.numero LIKE :numero')
      ->setParameter('numero', '%' . $number . '%')
      ->getQuery()
      ->getResult();

    $index = 0;
    $is_char_free = FALSE;
    while (!$is_char_free) {

      if ($index >= sizeof($mod_char)) {
        return null;
      }

      $char = $mod_char[$index];

      foreach ($presupuestos as $presupuesto) {
        $raw_number = trim($presupuesto->getNumero());

        if (strpos($raw_number, $char) === FALSE) {
          $is_char_free = TRUE;
        }
        else {
          $is_char_free = FALSE;
        }
      }

      if ($is_char_free)
        $number = $number . $char;
      else
        $index++;
    }

    return $number;
  }
}