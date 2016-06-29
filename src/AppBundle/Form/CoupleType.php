<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
class CoupleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('middlename')
            ->add('lastname')
            ->add('email')
            ->add('phone')
            ->add('sex', ChoiceType::class, array(
                'choices'  => array(
                    'Female' => 'Female',
                    'Male' => 'Male',
                )))
            ->add('dob', DateType::class, array(
                'widget' => 'single_text',
                'html5' => false,
            ))
            ->add('role', ChoiceType::class, array(
                'choices'  => array(
                    'Bride' => 'Bride',
                    'Groom' => 'Groom',
                )))
            ->add('image', FileType::class)
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Couple'
        ));
    }
}
