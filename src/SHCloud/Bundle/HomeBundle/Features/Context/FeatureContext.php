<?php

namespace SHCloud\Bundle\HomeBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
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
        $hash = $table->getRows();
        foreach($hash as $row){

        }
    }

    /**
     * @Then /^debo ver el evento "([^"]*)" con fecha "([^"]*)"$/
     */
    public function deboVerElEventoConFecha($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then /^ambos eventos deben tener enlaces para registrarse como participante y ponente$/
     */
    public function ambosEventosDebenTenerEnlacesParaRegistrarseComoParticipanteYPonente()
    {
        throw new PendingException();
    }

}
