<?php

namespace SHCloud\Bundle\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SHCloud\Bundle\RegisterBundle\Entity\Usuario;
use SHCloud\Bundle\RegisterBundle\Entity\Presentacion;
use SHCloud\Bundle\RegisterBundle\Form\Type\RegistroType;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /**
     * @Route("/ponente", name="registro_ponente")
     * @Template()
     */
    public function registroPonenteAction(Request $request)
    {
        $usuario = new Usuario();
        $usuario->setTipo(Usuario::$TYPE_PONENTE);
        $usuario->setPresentacion(new Presentacion());
        $form = $this->container->get('fos_user.registration.form');
        
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                return $this->redirect($this->generateUrl('registro_exitoso'));
            }
        }
        
        $ciudad = $this->container->getParameter('ciudad');
        return array('ciudad' => $ciudad, 'form' => $form->createView());
    }
}
