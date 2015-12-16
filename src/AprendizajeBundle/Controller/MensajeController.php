<?php

namespace AprendizajeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MensajeController extends Controller
{
    public function leerAction()
    {
        return $this->render('AprendizajeBundle:Mensaje:verMensaje.html.twig');
    }
}
