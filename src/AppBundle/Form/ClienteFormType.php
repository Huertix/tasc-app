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
        'label' => 'Código'

      ))
      ->add('nombre', TextType::class, array(
        'empty_data' => '',
        'trim' => true,
        'required' => true
      ))
      ->add('cif', TextType::class, array(
        'empty_data' => '',
        'trim' => true,
        'required' => true,
        'label' => 'CIF'
      ))
      ->add('f_alta', DateType::class, array(
        'label' => 'Fecha de Alta',
        'html5' => false,
        'widget' => 'single_text',
        'disabled' => true,
        'attr' => ['class' => 'js-datepicker'],
      ))

      ->add('direccion', TextType::class, array(
        'empty_data' => '',
        'trim' => true,
        'label' => 'Dirección'
      ))
      ->add('codpost', null , array(
        'empty_data' => ''
      ))
      ->add('poblacion', TextType::class, array(
        'empty_data' => '',
        'trim' => true,
        'label' => 'Población'
      ))
      ->add('provincia', TextType::class, array(
        'empty_data' => '',
        'trim' => true
      ))
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
      ->add('tipofac', ChoiceType::class, [
        'choices' => [
          'Varios' => '00',
          'Mensual' => '01',
          'Talon' => '02',
          'Aplazado' => '03',
          'Confirming' => '04',
          'Transferencia' => '05',
          'Bank Transfer' => '06',
          'Recibo' => '07',
          'Giro' => '08',
          '45 D Confirming' => '45',
          '60 D Confirming' => '60',
          'Anticipado' => 'AN',
          'Pagare' => 'PG'

        ]
      ])
      ->add('credito', TextType::class, array(
        'empty_data' => '0',
        'trim' => true

      ))
      ->add('descu1', TextType::class, array(
        'empty_data' => '0',
        'trim' => true
      ))
      ->add('tipo_iva', null, array(
        'empty_data' => '0',
        'trim' => true
      ))
      ->add('email', EmailType::class, array(
        'empty_data' => '',
        'trim' => true,
        'required' => true
      ))
      ->add('observacio', TextType::class, array(
        'empty_data' => '',
        'trim' => true,
        'label' => 'Observaciones'
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