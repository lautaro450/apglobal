<?php
namespace AprendizajeBundle\Controller;

use AprendizajeBundle\Form\UserType;
use AprendizajeBundle\Entity\User;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RegistroController extends Controller
{
    public function indexAction()
    {
        return $this->render('AprendizajeBundle:Registro:index.html.twig');
    }

    public function verificacionAction()
    {

    }

    public function registerAction(Request $request)
    {
    $registration = new User();

    $form = $this->createForm(new UserType(), $registration, ['action' => $this->generateUrl('aprendizaje_registro'), 'method' => 'POST']);

    $form->handleRequest($request);

        if ($form->isValid()) {

            $password = $form->get('password')->getData();
            $password2 = $form->get('confirm')->getData();
            if ($password == $password2) {
                $options = [
                    'cost' => 12,
                ];
                $password = $form->get('password')->getData();
                $hashPassword = password_hash($password, PASSWORD_BCRYPT, $options);
                $registration->setPassword($hashPassword);
                $registration->setRoles("ROLE_USER");
                $em = $this->getDoctrine()->getManager();
                $em->persist($registration);
                $em->flush();

                $session = $this->getRequest()->getSession();
                $session->getFlashBag()->add('message', 'Registrado! Ya podes acceder a todo nuestro contenido');

                return $this->redirect($this->generateUrl('aprendizaje_login'));
            }
            else
            {
                 $this->get('session')->getFlashBag()->add(
                    'notice',
                    'Error: Las claves no coinciden'
                 );
        return $this->render('AprendizajeBundle:Registro:index.html.twig', array('form' => $form->createView()));
            }
        }

        return $this->render('AprendizajeBundle:Registro:index.html.twig', array('form' => $form->createView()));

    }

    public function registroCompletadoAction()
    {

        return $this->render('AprendizajeBundle:Registro:form2saved.html.twig');

    }
}
