<?php
namespace AprendizajeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', ['label'=>'User Name'])
                ->add('password', 'password',['label'=>'Password'])
                ->add('confirm', 'password', ['mapped' => false,'label'=>'Re-type password'])
                ->add('homepage', 'text',['label'=>'Homepage'])
                ->add('email', 'hidden', ['label'=>'email'])
                ->add('save', 'submit', ['label'=>'Register'])
        ;
    }

    public function getName()
    {
        return 'registration';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AprendizajeBundle\Entity\User',
        ]);
    }

}