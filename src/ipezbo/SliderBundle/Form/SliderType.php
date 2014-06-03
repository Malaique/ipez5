<?php

namespace ipezbo\SliderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SliderType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', 'text')
                ->add('description', 'textarea')
                ->add('file', 'file', array('required' => false))
                ->add('isActive', 'choice', array(
                    'choices' => array(
                        '0' => 'Non',
                        '1' => 'Oui',
                    ),
                    'multiple' => false,
                ))
                ->add('position', 'number')
                ->add('link')
                ->add('target', 'choice', array(
                    'choices' => array(
                        '0' => 'Interne',
                        '1' => 'Nouvelle fenêtre',
                    ),
                    'multiple' => false,
                ))
                ->add('backgroundColor')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\SliderBundle\Entity\Slider'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ipezbo_sliderbundle_slider';
    }

}
