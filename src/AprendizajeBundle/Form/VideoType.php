<?php

namespace AprendizajeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class VideoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $categoria = $this->verCategoriaAction();
        $builder
            ->add('titulo')
            ->add('descripcion', TextareaType::class)
            ->add('link')
            ->add('tipo', ChoiceType::class, array(
                'choices' => $categoria,
                'required'    => true,
                'placeholder' => 'Categoria',
                'empty_data'  => null
            ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AprendizajeBundle\Entity\Video'
        ));
    }
}
