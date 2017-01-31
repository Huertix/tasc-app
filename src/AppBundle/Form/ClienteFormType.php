<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('codigo', null,  array(
        'disabled' => true,
      ))
      ->add('nombre')
      ->add('cif')
      ->add('f_alta', DateType::class, array(
        'label' => 'Fecha de Alta',
        'html5' => false, 'widget' => 'single_text',
        'disabled' => true,
        'attr' => ['class' => 'js-datepicker'],
      ))

      ->add('direccion')
      ->add('codpost')
      ->add('poblacion')
      ->add('provincia')
      ->add('pais', ChoiceType::class, [
        'choices' => [
          'Spain' => '034',
          'Brasil' => '800',
        ]
      ])
      ->add('vendedor')
      ->add('tipofac')
      ->add('credito')
      ->add('descu1')
      ->add('tipo_iva')
      ->add('email')
      ->add('observacio')
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => 'AppBundle\Entity\Cliente'
    ]);
  }
}