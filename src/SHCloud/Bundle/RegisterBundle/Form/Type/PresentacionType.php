<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PresentacionType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('titulo', 'text');
        $builder->add('resumen', 'textarea');
        $builder->add('laminas', 'file');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SHCloud\Bundle\RegisterBundle\Entity\Presentacion',
            'validation_groups' => array('registro')
        ));
    }    
    
    public function getName() {
        return 'presentacion';
    }
}

?>
