<?php

namespace SHCloud\Bundle\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use SHCloud\Bundle\RegisterBundle\Entity\Usuario;
use SHCloud\Bundle\RegisterBundle\Entity\Pago;
use SHCloud\Bundle\RegisterBundle\Entity\Presentacion;
use SHCloud\Bundle\RegisterBundle\Form\Type\RegistroType;
use Symfony\Component\HttpFoundation\Request;
use SHCloud\Bundle\RegisterBundle\Service\RegistroService;

class RegisterController extends Controller
{
    /**
     * @Route("/participante", name="registro_participante")
     * @Template()
     */
    public function registroParticipanteAction(Request $request)
    {
        /**
         * @var RegistroType
         */
        $form = $this->container->get('fos_user.registration.form');
        
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $registroService = $this->get('shcloud_register.registro_service');
                $registroService->registrarParticipante($form->getData());
                return $this->redirect($this->generateUrl('registro_exitoso'));
            }
        }
        
        $ciudad = $this->container->getParameter('ciudad');
        return array('ciudad' => $ciudad, 'form' => $form->createView());
    }

    /**
     * @Route("/ponente", name="registro_ponente")
     * @Template()
     */
    public function registroPonenteAction(Request $request)
    {
        $form = $this->container->get('fos_user.registration.form');
        
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            
            if ($form->isValid()) {
                $registroService = $this->get('shcloud_register.registro_service');
                $registroService->registrarPonente($form->getData());
                return $this->redirect($this->generateUrl('registro_exitoso'));
            }
        }
        
        $ciudad = $this->container->getParameter('ciudad');
        return array('ciudad' => $ciudad, 'form' => $form->createView());
    }
    
    /**
     * @Route("/registroexitoso", name="registro_exitoso")
     * @Template()
     */
    public function registroExitosoAction(Request $request)
    {
        return array();
    }

}
