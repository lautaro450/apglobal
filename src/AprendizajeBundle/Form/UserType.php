<?php

namespace AprendizajeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'email')
            ->add('password', 'password')
            ->add('confirm', 'password', ['mapped' => false,'label'=>'Re-type password'])
            ->add('isActive')
            ->add('save', 'submit', ['label'=>'Register'])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AprendizajeBundle\Entity\User'
        ));
    }
}
