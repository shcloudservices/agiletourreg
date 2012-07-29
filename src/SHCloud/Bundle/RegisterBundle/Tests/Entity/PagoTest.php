<?php
namespace SHCloud\Bundle\RegisterBundle\Tests;

use SHCloud\Bundle\RegisterBundle\Entity\Pago;
use Symfony\Component\Validator\ValidatorFactory;

class PagoTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Symfony\Component\Validator\Validator
     */
    private $validator;
    
    public function setUp()
    {
        //$this->validator = ValidatorFactory::buildDefault()->getValidator();
    }
    
    public function testPago()
    {
        $this->assertTrue(true);
    }
}

?>
