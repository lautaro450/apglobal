<?php

namespace AprendizajeBundle\Controller;

use AprendizajeBundle\Form\CategoriaType;
use AprendizajeBundle\Entity\Categoria;
use AprendizajeBundle\Form\SubcategoriaType;
use AprendizajeBundle\Entity\Subcategoria;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('AprendizajeBundle:Default:index.html.twig');
    }

    public function agregarCategoriaAction(Request $request)
    {
	    $categoria = new Categoria();

	    $form = $this->createForm(new CategoriaType(), $categoria, ['action' => $this->generateUrl('aprendizaje_admin_categoria_agregar'), 'method' => 'POST']);

	    $form->handleRequest($request);

        if ($form->isValid()) 
        {
                $em = $this->getDoctrine()->getManager();
                $em->persist($categoria);
                $em->flush();

                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('message', 'Categoria agregada con exito.');

        return $this->render('AprendizajeBundle:Admin:agregarCategoria.html.twig', array('form' => $form->createView()));
        }
        return $this->render('AprendizajeBundle:Admin:agregarCategoria.html.twig', array('form' => $form->createView()));
    }

    public function verCategoriaAction()
    {
         $repository = $this->getDoctrine()->getRepository('AprendizajeBundle:Categoria');
            $query = $repository->createQueryBuilder('p')
            ->getQuery();
            $buffer_categoria = $query->getResult();
            $categoria = array();
                        foreach($buffer_categoria as $key => $value)
                        {
                            $id = $value->getid();
                            $nombreCategoria = $value->getNombre();
                            $categoria[$id] = $nombreCategoria;
                        }
        return $categoria;
    }


    public function agregarSubCategoriaAction(Request $request)
    {
        $categoria = $this->verCategoriaAction();

	    $subcategoria = new categoria();

        $form = $this->createFormBuilder($subcategoria)
            ->add('nombre', 'text', array('label' => 'Nombre', 'constraints' => new NotBlank()))
            ->add('parentId', ChoiceType::class, array('label' => 'Nombre',
                'choices' => $categoria
                ))
            ->getForm();
	    $form->handleRequest($request);

        if ($form->isValid()) 
        {
                $em = $this->getDoctrine()->getManager();
                $em->persist($subcategoria);
                $em->flush();

                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('message', 'Sub-Categoria agregada con exito.');

                return $this->redirect($this->generateUrl('aprendizaje_admin_categoria_agregar_sub'));
        }
        return $this->render('AprendizajeBundle:Admin:Subcategoria.html.twig', array('form' => $form->createView()));
    }

    public function categoriaAction()
    {
                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('message', 'Categoria agregada con exito.');

        return $this->render('AprendizajeBundle:Admin:agregarCategoria.html.twig', array('form' => $form->createView()));
    }
}
