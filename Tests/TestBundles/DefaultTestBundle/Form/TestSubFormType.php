<?php

namespace Fp\JsFormValidatorBundle\Tests\TestBundles\DefaultTestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class TestSubFormType
 *
 * @package Fp\JsFormValidatorBundle\Tests\TestBundles\DefaultTestBundle\Form
 */
class TestSubFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'constraints' => array(
                    new NotBlank(array(
                        'message' => 'form_no_groups_message'
                    )),
                    new NotBlank(array(
                        'message' => 'form_groups_array_message',
                        'groups' => array('groups_array')
                    )),
                    new NotBlank(array(
                        'message' => 'form_groups_child_message',
                        'groups' => array('groups_child')
                    ))
                )
            ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Fp\JsFormValidatorBundle\Tests\TestBundles\DefaultTestBundle\Entity\TestSubEntity',
        ));
    }
}
