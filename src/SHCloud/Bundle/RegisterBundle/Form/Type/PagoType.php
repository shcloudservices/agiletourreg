<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PagoType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('banco', 'choice', array('choices' => array(
            'MERCANTIL' => 'Mercantil', 
            'BANESCO' => 'Banesco'
            )));
        $builder->add('tipoTransaccion', 'choice', array('choices' => array(
            '1' => 'Depósito', 
            '2' => 'Transferencia'
            )));
        $builder->add('numeroTransaccion', 'text');        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SHCloud\Bundle\RegisterBundle\Entity\Pago',
            'validation_groups' => array('registro')
        ));
    }    
    
    public function getName() {
        return 'pago';
    }
}

?>
