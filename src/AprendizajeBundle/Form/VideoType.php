<?php

namespace AprendizajeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;



class VideoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
private $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $helper = $this->container->get('aprendizaje.helper');
        $categoria = $helper->verCategoria(0);
        $builder
            ->add('titulo')
            ->add('descripcion', TextareaType::class)
            ->add('link')
            ->add('categoria', ChoiceType::class, array(
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
