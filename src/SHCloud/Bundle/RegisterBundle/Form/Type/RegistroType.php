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

        $builder->add('nombre', 'text');
        $builder->add('tipo', 'hidden');
        $builder->add('presentacion', new PresentacionType());
        $builder->add('pago', new PagoType());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
//            'data_class' => 'SHCloud\Bundle\RegisterBundle\Entity\Usuario',
//            'validation_groups' => function(FormInterface $form) {
//                $data = $form->getData();
//                if (SHCloud\Bundle\RegisterBundle\Entity\Usuario::TYPE_PONENTE == $data->getTipo()) {
//                    return array('ponente','registro');
//                } else {
//                    return array('participante', 'registro');
//                }
//        },
        ));
    }
    
    public function getName()
    {
        return 'shcloud_register_registro';
    }
}

?>
