<?php

namespace SHCloud\Bundle\HomeBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Behat\Context\Step\Then;
use SHCloud\Behat\DataAwareContext;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

/**
 * Feature context.
 */
class FeatureContext extends DataAwareContext
{

    /**
     * @Given /^que existen los eventos:$/
     */
    public function queExistenLosEventos(TableNode $table)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $hash = $table->getHash();
        foreach($hash as $row){
            $event = new \SHCloud\Bundle\HomeBundle\Entity\Event();
            $event->setCiudad($row['Ciudad']);
            $event->setFecha(\DateTime::createFromFormat('d/m/Y', $row['Fecha']));
            /** @var $em \Doctrine\ORM\EntityManager */
            $em->persist($event);
        }
    }

    /**
     * @Then /^debo ver el evento "([^"]*)" con fecha "([^"]*)"$/
     */
    public function deboVerElEventoConFecha($ciudad, $fecha)
    {
        return array(
            new Then("debo ver texto que siga el patrón \"$ciudad\""),
            new Then("debo ver texto que siga el patrón \"$fecha\"")
        );
    }

    /**
     * @Then /^ambos eventos deben tener enlaces para registrarse como participante y ponente$/
     */
    public function ambosEventosDebenTenerEnlacesParaRegistrarseComoParticipanteYPonente()
    {
        return new Then("debo ver 4 \"li.event-link\" elementos");
    }

}
