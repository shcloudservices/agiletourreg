<?php
namespace SHCloud\Bundle\RegisterBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToOne(targetEntity="Presentacion")
     * @ORM\JoinColumn(name="presentacion_id", referencedColumnName="id")
     */
    protected $presentacion;
    
    /**
     * @ORM\OneToOne(targetEntity="Pago")
     * @ORM\JoinColumn(name="pago_id", referencedColumnName="id")
     */
    private $pago;

    public function __construct()
    {
        parent::__construct();
        $this->presentations = new ArrayCollection();
    }
    
    
}
