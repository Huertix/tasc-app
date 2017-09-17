<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
      ->add('codpost', null , array(
        'empty_data' => ''
      ))
      ->add('poblacion')
      ->add('provincia')
      ->add('pais', ChoiceType::class, [
        'choices' => [
          'Spain' => '034',
          'Brasil' => '800',
          'Paraguay' => '520'
        ]
      ])
      ->add('vendedor', ChoiceType::class, [
        'choices' => [
          'Miguel Angel' => '01',
          'Jorge' => '02',
          'Rafael Sevilla' => '03'
        ]
      ])
      ->add('tipofac')
      ->add('credito', TextType::class, array(
        'empty_data' => '0'
      ))
      ->add('descu1', TextType::class, array(
        'empty_data' => '0'
      ))
      ->add('tipo_iva', null, array(
        'empty_data' => '0'
      ))
      ->add('email', EmailType::class, array(
        'empty_data' => ''
      ))
      ->add('observacio', Type::class, array(
        'empty_data' => ''
      ))
    ;
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => 'AppBundle\Entity\Cliente'
    ]);
  }
}