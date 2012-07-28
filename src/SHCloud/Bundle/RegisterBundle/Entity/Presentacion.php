<?php

namespace SHCloud\Bundle\RegisterBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * SHCloud\Bundle\RegisterBundle\Entity\Presentation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Presentacion {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $titulo
	 *
	 * @ORM\Column(name="titulo", type="string", length=255)
	 */
	private $titulo;

	/**
	 * @var text $resumen
	 *
	 * @ORM\Column(name="resumen", type="text")
	 */
	private $resumen;

	/**
	 * @var string $ruta
	 *
	 * @ORM\Column(name="ruta", type="string", length=255)
	 */
	private $ruta;


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
     * Set titulo
     *
     * @param string $titulo
     * @return Presentacion
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set resumen
     *
     * @param text $resumen
     * @return Presentacion
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;
        return $this;
    }

    /**
     * Get resumen
     *
     * @return text 
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set ruta
     *
     * @param string $ruta
     * @return Presentacion
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;
        return $this;
    }

    /**
     * Get ruta
     *
     * @return string 
     */
    public function getRuta()
    {
        return $this->ruta;
    }
}