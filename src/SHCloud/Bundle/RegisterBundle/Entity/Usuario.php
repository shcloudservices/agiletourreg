<?php
namespace SHCloud\Bundle\RegisterBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


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
     * @Assert\NotBlank(message="Introduzca su nombre completo", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="El nombre es demasiado corto", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="El nombre es demasiado largo", groups={"Registration", "Profile"})
     */    
    protected $nombre;
    
    /**
     * @ORM\OneToOne(targetEntity="Presentacion")
     * @ORM\JoinColumn(name="presentacion_id", referencedColumnName="id")
     */
    protected $presentacion;
    
    /**
     * @ORM\OneToOne(targetEntity="Pago")
     * @ORM\JoinColumn(name="pago_id", referencedColumnName="id")
     */
    protected $pago;

    public function __construct()
    {
        parent::__construct();
    }
    
    
}
