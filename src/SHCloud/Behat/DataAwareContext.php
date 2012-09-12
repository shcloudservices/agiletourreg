<?php
namespace SHCloud\Behat;

use Behat\MinkExtension\Context\MinkContext;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;

class DataAwareContext extends MinkContext implements KernelAwareInterface
{
    protected $kernel;
    protected $parameters;

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

    public function get($service)
    {
        return $this->kernel->getContainer()->get($service);
    }

}
