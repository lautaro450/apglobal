<?php
namespace AprendizajeBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class MyListener
{
    protected $twig;
    protected $container;

    public function __construct(\Twig_Environment $twig, Container $container)
    {
        $this->twig = $twig;
        $this->container = $container;

    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $securityContext = $this->container->get('security.context');
        $token = $securityContext->getToken();
        $user = $token->getUser();
        $helper = $this->container->get('aprendizaje.helper');

        $CantidadVideos = $helper->contarVideos($user->getId());
        $this->twig->addGlobal('cantidadVideos', $CantidadVideos);
    }
}
?>