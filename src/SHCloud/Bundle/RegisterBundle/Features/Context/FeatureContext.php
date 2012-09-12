<?php

namespace SHCloud\Bundle\RegisterBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use SHCloud\Behat\DataAwareContext;
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

/**
 * Feature context.
 */
class FeatureContext extends DataAwareContext
{

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
