<?php

namespace SHCloud\Bundle\RegisterBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;

/**
 * SHCloud\Bundle\RegisterBundle\Entity\Presentation
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
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
	 * @ORM\Column(name="ruta", type="string", length=255, nullable=false)
         * @Assert\NotNull
	 */
	private $ruta;

    /**
     * @Assert\File(
     *      maxSize="6M",
     *      mimeTypes = {"application/pdf", "application/x-pdf"},
     *      mimeTypesMessage = "Por favor cargue un PDF válido"
     * )
     */
    protected $archivo;

    private $archivoARemover;
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->archivo) {
            $this->ruta = $this->archivo->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->archivo) {
            return;
        }

        $this->archivo->move($this->getUploadRootDir(), $this->id.'.'.$this->archivo->guessExtension());
        unset($this->archivo);
    }
    
    /**
     * @ORM\PreRemove()
     */
    public function guardarArchivoARemover()
    {
        $this->archivoARemover = $this->getRutaAbsoluta();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->archivoARemover) {
            unlink($this->archivoARemover);
        }
    }
    
    
    

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
    
    public function getRutaAbsoluta()
    {
        return null === $this->ruta ? null : $this->getUploadRootDir().'/'.$this->id.'.'.$this->ruta;
    }

    public function getRutaWeb()
    {
        return null === $this->ruta ? null : $this->getUploadDir().'/'.$this->ruta;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }    
}