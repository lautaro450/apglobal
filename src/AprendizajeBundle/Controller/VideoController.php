<?php
namespace AprendizajeBundle\Controller;

use AprendizajeBundle\Form\VideoType;
use AprendizajeBundle\Entity\Video;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class VideoController extends Controller
{
    public function indexAction()
    {
        return $this->render('AprendizajeBundle:Video:index.html.twig');
    }

    public function subirAction(Request $request)
    {

        $helper = $this->get('aprendizaje.helper');
        $postRequest = $request->request->get('idCategoria');
        if($postRequest != NULL)
        {
            return $helper->verSubCategoria($postRequest);
        }

        //Categoria = 0 => Categoria padre
        //Categoria != 0 => Categoria Hija
        $categoria = $helper->verCategoria(0); 
	    $video = new Video();

        $form = $this->createFormBuilder($video)
            ->add('titulo')
            ->add('descripcion', TextareaType::class)
            ->add('link')
            ->add('categoria', ChoiceType::class, array(
                'choices' => $categoria,
                'required'    => true,
                'placeholder' => 'Categoria',
                'empty_data'  => null))
            ->getForm();
	    $form->handleRequest($request);

        if ($form->isValid()) 
        {
                $registration->setPassword($hashPassword);
                $em = $this->getDoctrine()->getManager();
                $em->persist($video);
                $em->flush();

                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('message', 'Registrado! Ya podes acceder a todo nuestro contenido');

                return $this->redirect($this->generateUrl('aprendizaje_login'));
        }
        return $this->render('AprendizajeBundle:Video:subir.html.twig', array('form' => $form->createView()));
    }
}
