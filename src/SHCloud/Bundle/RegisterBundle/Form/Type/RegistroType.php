<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use SHCloud\Bundle\RegisterBundle\Form\Type\PagoType;
use SHCloud\Bundle\RegisterBundle\Form\Type\PresentacionType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Formulario de Registro
 */
class RegistroType extends BaseType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('nombre');
        $builder->add('presentacion', new PresentacionType);
        $builder->add('pago', new PagoType);
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SHCloud\Bundle\RegisterBundle\Entity\Usuario',
        ));
    }
    
    public function getName()
    {
        return 'shcloud_user_registration';
    }
}

?>
