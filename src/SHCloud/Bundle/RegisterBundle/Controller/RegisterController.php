<?php

namespace SHCloud\Bundle\RegisterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RegisterController extends Controller
{
    /**
     * @Route("/ponente", name="registro_ponente")
     * @Template()
     */
    public function registroPonenteAction()
    {
        return array();
    }
}
