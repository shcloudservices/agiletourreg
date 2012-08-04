<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

/**
 * Formulario de Registro
 */
class RegistrationFormType extends BaseType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // 
        $builder->add('nombre');
        $builder->add('presentacion');
        $builder->add('pago');
    }

    public function getName()
    {
        return 'acme_user_registration';
    }
}

?>
