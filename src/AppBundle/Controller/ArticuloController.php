<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ArticuloController extends Controller
{



  /**
   * @Route("/articulos", name="articulos")
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

    $vendedores = $em->getRepository('AppBundle\Entity\Vendedor')
      ->findAll();

    return $this->render('articulos/lista_articulos.html.twig', [
      'articulos' => $articulos,
      'familias' => $familias,
      'marcas' => $marcas,
      'vendedores' => $vendedores,
    ]);

  }

}
