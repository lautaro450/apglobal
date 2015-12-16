<?php

namespace AprendizajeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
    	$usuario = $this->get('security.token_storage')->getToken()->getUser();
    	$helper = $this->get('aprendizaje.helper');
    	$videos = $helper->verVideo();

        return $this->render('AprendizajeBundle:Home:index.html.twig',array('videos' => $videos));
    }
}
