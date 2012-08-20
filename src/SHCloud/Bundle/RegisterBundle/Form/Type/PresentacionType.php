<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PresentacionType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titulo', 'text', array('label'=>'Título de la conferencia'));
        $builder->add('resumen', 'textarea', array('label'=>'Resumen de la conferencia'));
        $builder->add('archivo', 'file', array('label' => 'Anexar presentación'));
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
