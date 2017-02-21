<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Presupuesto;
use AppBundle\Entity\PresupuestoDetalles;
use AppBundle\Form\PresupuestoDetallesFormType;
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

    $next_presupuesto_number = $this->get_next_presupuesto_number();

    $em = $this->getDoctrine()->getManager();


    $clientes = $em->getRepository('AppBundle\Entity\Cliente')
      ->findAll();

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
      'marcas' => $marcas,
      'numero_presupuesto' => $next_presupuesto_number
    ]);


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

    $familias = $em->getRepository('AppBundle\Entity\Familia')
      ->findAll();

    $marcas = $em->getRepository('AppBundle\Entity\Marca')
      ->findAll();



    if (!$detalles_presupuesto) {
      throw $this->createNotFoundException('Presupuesto no Encontrado');
    }


    return $this->render('presupuestos/vista_presupuesto.html.twig', [
      'presupuesto' => $presupuesto,
      'detalles_presupuesto' => $detalles_presupuesto,
      //'cliente' => $cliente,
      'clientes' => $clientes,
      'articulos' => $articulos,
      'familias' => $familias,
      'marcas' => $marcas,
    ]);

    //TODO: Check transpasado for prespuesto modifications
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

    //dump($parametersAsArray);die();

    try {

      $cliente = $em->getRepository('AppBundle:Cliente')
        ->findOneBy([
          'codigo' => str_pad ( $parametersAsArray["cliente"] , 15 , $pad_string = " ", $pad_type = STR_PAD_RIGHT )
        ]);


      $numero = str_pad ( $parametersAsArray["numero"], 10, $pad_string = " ", $pad_type = STR_PAD_LEFT);

      $c_presup = new Presupuesto();
      $c_presup->setNumero($numero);
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

          $d_presup->setNumero($numero);
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

      $respose_array = [
        "sucess" => True,
        "message" => "Presupuesto saved",
        "presupuesto" => $parametersAsArray["numero"]
      ];

    } catch (\Exception $e) {
      switch (get_class($e)) {
        case 'Doctrine\DBAL\DBALException':
          $respose_array['succes'] = False;
          $respose_array['message'] = "DBAL Error: " . $e->getMessage();
          break;
        case 'Doctrine\DBA\DBAException':
          $respose_array['succes'] = False;
          $respose_array['message'] = "DBA Error: " . $e->getMessage();
          break;
        default:
          throw $e;
          break;
      }
    }


    return new JsonResponse($respose_array);
  }


  /**
   * Export to PDF
   * http://blog.michaelperrin.fr/2016/02/17/generating-pdf-files-with-symfony/
   * @Route("/pdf/{numero_presupuesto}", name="presupuesto_pdf")
   */
  public function pdfAction($numero_presupuesto) {

    $path_pdf_tmp = $this->get('kernel')->getRootDir() . '/../web/pdf_tmp/';
    $path_pdf_output = $this->get('kernel')->getRootDir() . '/../web/pdf_output/';

    $em = $this->getDoctrine()->getManager();

    $presupuesto = $em->getRepository('AppBundle:Presupuesto')
      ->findOneBy([
        'numero' => str_pad ( $numero_presupuesto, 10 , $pad_string = " ", $pad_type = STR_PAD_LEFT )
      ]);

    $cliente = $presupuesto->getCliente();
    $detalles_presupuesto = $presupuesto->getpresupuesto_detalles();

    $total_rows = count($detalles_presupuesto);

    $pages_body_array = [];
    if ($total_rows >= 55) {

    } else {
        array_push($pages_body_array, $detalles_presupuesto);
    }


    $page_count = 1;
    foreach ($pages_body_array as $page_body) {

      $html = $this->renderView('presupuestos/pdf.html.twig', [
          'page_body' => $page_body,
          'cliente' => $cliente,
          'presupuesto' => $presupuesto
      ]);

      $filename = sprintf('page-%s.pdf', $page_count++);

      $this->get('knp_snappy.pdf')->generateFromHtml(
        $html,
        $path_pdf_tmp . $filename
      );
    }


    $finder = new Finder();
    $finder->files()->in($path_pdf_tmp)->name('*.pdf')->sortByName();

    $m = new Merger();
    $m->addFinder($finder);

    file_put_contents($path_pdf_output . 'PR' . $numero_presupuesto . '.pdf', $m->merge());

    $this->recursiveRemoveDirectory($path_pdf_tmp);

    die();


    return new Response(
        $this->get('knp_snappy.pdf')->getOutputFromHtml($html),
        200,
        [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $filename),
        ]
    );
  }

  function recursiveRemoveDirectory($directory)
  {
    foreach(glob("{$directory}/*") as $file)
    {
      if(is_dir($file)) {
        $this->recursiveRemoveDirectory($file);
      } else {
        unlink($file);
      }
    }
  }


}