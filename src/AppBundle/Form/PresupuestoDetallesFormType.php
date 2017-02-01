<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PresupuestoDetallesFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('articulo')
      ->add('definicion')
      ->add('unidades')
      ->add('precio')
      ->add('dto1')
      ->add('importe')
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => 'AppBundle\Entity\PresupuestoDetalles'
    ]);
  }
}