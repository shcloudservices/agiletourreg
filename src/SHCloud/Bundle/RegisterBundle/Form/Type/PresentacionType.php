<?php
namespace SHCloud\Bundle\RegisterBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PresentacionType extends AbstractType{

    public function buildForm(FormBuilder $builder, array $options)
    {
        
    }
    
    public function getName() {
        return 'presentacion';
    }
}

?>
