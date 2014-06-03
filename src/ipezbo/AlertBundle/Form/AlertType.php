<?php

namespace ipezbo\AlertBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlertType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $order = "ASC";
        $builder
                ->add('brand', 'entity', array(
                    'class' => 'ipezboBrandBundle:Brand',
                    'property' => 'name',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control'),
                    'query_builder' => function(\ipezbo\BrandBundle\Entity\BrandRepository $r) use ($order) {
                return $r->getBrandByOrder($order);
            })
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\AlertBundle\Entity\Alert'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ipezbo_alertbundle_alert';
    }

}
