<?php

namespace AprendizajeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AprendizajeBundle:Default:index.html.twig');
    }
}
