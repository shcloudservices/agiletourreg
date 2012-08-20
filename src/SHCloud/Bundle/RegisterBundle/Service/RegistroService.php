<?php

namespace SHCloud\Bundle\RegisterBundle\Service;

use SHCloud\Bundle\RegisterBundle\Entity\Usuario;
use SHCloud\Bundle\RegisterBundle\Exception\RegisterException;

class RegistroService {

    protected $entityManager;
    protected $mailer;

    public function __construct(\Doctrine\ORM\EntityManager $entityManager, \Swift_Mailer $mailer) {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
    }

    public function registrarPonente(Usuario $usuario)
    {
        $usuario->setPago(null);
        try{
            $this->entityManager->persist($usuario->getPresentacion());
            $this->entityManager->persist($usuario);
            $this->entityManager->flush();
            
        } catch (Exception $e){
            throw new RegisterException();
        }
        
    }
    
}