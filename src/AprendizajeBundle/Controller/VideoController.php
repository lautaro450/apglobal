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
    public function testAction()
    {
        $helper = $this->get('aprendizaje.helper');
        $test = $helper->contarVideos(1);
        die(print_r($test,true));
        /*
        $helper = $this->get('aprendizaje.helper');
        $subCategorias = $helper->verSubCategoria(1);
        // die(print_r($subCategorias));
        $template = $this->renderView('AprendizajeBundle:Video:verSubCategorias.html.twig', array( 'subCategorias' => $subCategorias));
        return new Response($template);
        */

    }
    public function subirAction(Request $request)
    {
        //Llamamos al  helper
        $helper = $this->get('aprendizaje.helper');

        //Recibimos la ajax request en caso de que se envie
        $postRequest = $request->request->get('idCategoria');
        if($postRequest != NULL)
        {
            $subCategorias = $helper->verSubCategoria($postRequest);
            $template = $this->renderView('AprendizajeBundle:Video:verSubCategorias.html.twig', array( 'subCategorias' => $subCategorias));
            return new Response($template);
        }

	    $video = new Video();
        $videoType = $this->get('aprendizaje.formType.Video');
        $form = $this->createForm($videoType, $video, ['action' => $this->generateUrl('aprendizaje_subir_video'), 'method' => 'POST']);

	    $form->handleRequest($request);
        if ($form->isValid()) 
        {
            $titulo = $form->get('titulo')->getData();
            if($helper->verificarTituloVideo($titulo) === TRUE)
            {
                $subCategoria = $request->request->get('subCategoria');
                $em = $this->getDoctrine()->getManager();
                $video->setSubCategoria($subCategoria);
                $video->setFecha(new \DateTime("now"));
                $em->persist($video);
                $em->flush();

                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('message', 'Video agregado! Muchas gracias por aportar contenido a la web!.');

                return $this->redirect($this->generateUrl('aprendizaje_subir_video'));
            }
            else
            {
                return new response("hola");
            }

        }
        return $this->render('AprendizajeBundle:Video:subir.html.twig', array('form' => $form->createView()));
    }

    public function verAction($videoID)
    {
        return $this->render('AprendizajeBundle:Video:verVideo.html.twig', array('videoID' => $videoID));
    }
}
