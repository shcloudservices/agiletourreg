<?php

namespace SHCloud\Bundle\RegisterBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\Behat\Context\Step\Given;
use Behat\Behat\Context\Step\When;
use Behat\Behat\Event\SuiteEvent;

use Doctrine\Common\DataFixtures\Purger\ORMPurger;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Feature context.
 */
class FeatureContext extends MinkContext
                  implements KernelAwareInterface
{
    private $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;        
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }
    
    /** 
     * @BeforeScenario 
     */
    public function before($event)
    {
        $em = $this->kernel->getContainer()->get('doctrine.orm.entity_manager');
        $purger = new ORMPurger($em);
        $purger->purge();
    }    
    
    /**
     * @Given /^que estoy en la página de inicio$/
     */
    public function queEstoyEnLaPaginaDeInicio()
    {
        return new Given('estoy en la página de inicio');
    }
    
    /**
     * @Given /^adjunto una presentación a "([^"]*)"$/
     */
    public function adjuntoUnaPresentacionA($nombreCampo)
    {
        return new When('adjunto el archivo "'.__DIR__.DIRECTORY_SEPARATOR.'presentacion.pdf" a "'.$nombreCampo.'"');
    }
    
    /** 
     * @AfterScenario
     */
    public function after($event)
    {
        $title = $event->getScenario()->getTitle();
        if($title === 'Visitante se registra como ponente'){
            $em = $this->kernel->getContainer()->get('doctrine.orm.entity_manager');
            $presentacion = $em->getRepository('SHCloudRegisterBundle:Presentacion')->findOneByTitulo('Historia de una ida y una vuelta')->getNombreArchivo();
            unlink('uploads'.DIRECTORY_SEPARATOR.$presentacion);
        }        
    }
}
