<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ArticuloController extends Controller
{



  /**
   * @Route("/articulos", name="lista_articulos")
   */
  public function listAction()
  {
    $em = $this->getDoctrine()->getManager();

    $articulos = $em->getRepository('AppBundle\Entity\Articulo')
      ->findAll();

    $familias = $em->getRepository('AppBundle\Entity\Familia')
      ->findAll();

    $marcas = $em->getRepository('AppBundle\Entity\Marca')
      ->findAll();


    return $this->render('articulos/lista_articulos.html.twig', [
      'articulos' => $articulos,
      'familias' => $familias,
      'marcas' => $marcas,
    ]);

  }

  /**
   * @Route("/api/articulos/{codigo_articulo}", name="api_articulo")
   */
  public function getAction($codigo_articulo) {

    $codigo_articulo = str_pad ( $codigo_articulo , 20 , $pad_string = " ", $pad_type = STR_PAD_RIGHT );

    $em = $this->getDoctrine()->getManager();

    $art = $em->getRepository('AppBundle:Articulo')
      ->findOneBy([
        'codigo' => $codigo_articulo
      ]);

    $articulo = [];

    // Split Definicion in lines of 75 characters
    $trimed_definicion = trim($art->getNombre2());
    $original_lines = explode(PHP_EOL,$trimed_definicion);
    $final_lines = [];

    foreach ( $original_lines as $line) {

      $line = utf8_encode($line);
      $line = str_replace("\r", "",$line);
      $words = explode(" ",$line);
      $line = "";
      $words_count = sizeof($words);

      for ($i = 0; $i < $words_count; $i++) {
        $spacer = $i == 0 ? "" : " ";
        if ($i === $words_count - 1) {
          $final_lines[] = $line . $spacer . $words[$i];

        } else {
          if(strlen($line) + strlen($words[$i]) <= 75) {
            $line = $line . $spacer . $words[$i];

          } else {
            $final_lines[] = $line;
            $line = $words[$i];
          }
        }
      }
    }

    $articulo[] = [
      'codigo' => trim($art->getCodigo()),
      'nombre' => trim($art->getNombre()),
      'definicion' => $final_lines,
      'tipo_iva' => $art->getTipoIva(),
      'precio' => number_format($art->getPvp()->getPvp(), 2, '.', ''),
      'coste' => $art->getCostUlt1(),
    ];

    $data = [
      'articulo' => $articulo
    ];

    return new JsonResponse($data);

  }

}
