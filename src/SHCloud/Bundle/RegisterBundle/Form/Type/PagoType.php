<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PagoType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
    }
    
    public function getName() {
        return 'pago';
    }
}

?>
