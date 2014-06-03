<?php

namespace ipezbo\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $order = "ASC";
        $builder
                ->add('name')
                ->add('reference')
                ->add('description')
                ->add('quantity')
                ->add('file', 'file')
                ->add('category', 'entity', array(
                    'class' => 'ipezboCategoryBundle:Category',
                    'property' => 'name',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control'),
                    'query_builder' => function(\ipezbo\CategoryBundle\Entity\CategoryRepository $r) use ($order) {
                return $r->getCategoryByOrder($order);
            }))
                ->add('brand', 'entity', array(
                    'class' => 'ipezboBrandBundle:Brand',
                    'property' => 'name',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control'),
                    'query_builder' => function(\ipezbo\BrandBundle\Entity\BrandRepository $r) use ($order) {
                return $r->getBrandByOrder($order);
            }))
                ->add('event', 'entity', array(
                    'class' => 'ipezboEventBundle:Event',
                    'property' => 'name',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control'),
                    'query_builder' => function(\ipezbo\EventBundle\Entity\EventRepository $r) use ($order) {
                return $r->getEventByOrder($order);
            }))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\ProductBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'ipezbo_productbundle_product';
    }

}
