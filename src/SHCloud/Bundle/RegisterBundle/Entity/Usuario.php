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
    
    public static $TYPE_PONENTE='ponente';
    public static $TYPE_PARTICIPANTE='participante';
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Introduzca su nombre completo", groups={"Registration", "Profile"})
     * @Assert\MinLength(limit="3", message="El nombre es demasiado corto", groups={"Registration", "Profile"})
     * @Assert\MaxLength(limit="255", message="El nombre es demasiado largo", groups={"Registration", "Profile"})
     */    
    protected $nombre;
    
    /**
     * @ORM\Column(type="string", length=12)
     * @Assert\Choice(
     *     choices = { "ponente", "participante" },
     *     message = "Elija un tipo de usuario válido"
     * )
     * @Assert\NotNull(message="El tipo de usuario no esta definido", groups={"Registration", "Profile"})
     */
    protected $tipo;
    
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
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getPresentacion() {
        return $this->presentacion;
    }

    public function setPresentacion($presentacion) {
        $this->presentacion = $presentacion;
    }

    public function getPago() {
        return $this->pago;
    }

    public function setPago($pago) {
        $this->pago = $pago;
    }

    /**
     * Sets the email.
     *
     * @param string $email
     *
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;
        $this->username = $email;
        return $this;
    }

    /**
     * Set the canonical email.
     *
     * @param string $emailCanonical
     *
     * @return Usuario
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;
        $this->usernameCanonical = $emailCanonical;
        return $this;
    }   
}
