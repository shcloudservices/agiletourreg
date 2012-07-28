<?php

namespace SHCloud\Bundle\RegisterBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SHCloud\Bundle\RegisterBundle\Entity\Pago
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Pago
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $banco
     *
     * @ORM\Column(name="banco", type="string", length=255)
     */
    private $banco;

    /**
     * @var string $tipoTransaccion
     *
     * @ORM\Column(name="tipoTransaccion", type="integer")
     */
    private $tipoTransaccion;

    /**
     * @var string $numeroTransaccion
     *
     * @ORM\Column(name="numeroTransaccion", type="string", length=10)
     */
    private $numeroTransaccion;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set banco
     *
     * @param string $banco
     * @return Pago
     */
    public function setBanco($banco)
    {
        $this->banco = $banco;
        return $this;
    }

    /**
     * Get banco
     *
     * @return string 
     */
    public function getBanco()
    {
        return $this->banco;
    }


    /**
     * Set tipoTransaccion
     *
     * @param integer $tipoTransaccion
     * @return Pago
     */
    public function setTipoTransaccion($tipoTransaccion)
    {
        $this->tipoTransaccion = $tipoTransaccion;
        return $this;
    }

    /**
     * Get tipoTransaccion
     *
     * @return integer 
     */
    public function getTipoTransaccion()
    {
        return $this->tipoTransaccion;
    }

    /**
     * Set numeroTransaccion
     *
     * @param string $numeroTransaccion
     * @return Pago
     */
    public function setNumeroTransaccion($numeroTransaccion)
    {
        $this->numeroTransaccion = $numeroTransaccion;
        return $this;
    }

    /**
     * Get numeroTransaccion
     *
     * @return string 
     */
    public function getNumeroTransaccion()
    {
        return $this->numeroTransaccion;
    }
}