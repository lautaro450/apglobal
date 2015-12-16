<?php

namespace AprendizajeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PerfilController extends Controller
{
    public function verAction()
    {
        return $this->render('AprendizajeBundle:Perfil:verPerfil.html.twig');
    }
}
