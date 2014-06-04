<?php

namespace ipezbo\GeneralSettingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GeneralSettingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('settingAttribute', 'text', array(
                    'label' => 'Attribut',
                    'attr' => array(
                        'placeholder' => 'Nom de l\'attribut')))
            ->add('settingValue', 'textarea', array(
                    'label' => 'Valeur',
                    'attr' => array(
                        'placeholder' => 'Valeur de l\'attribut')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\GeneralSettingBundle\Entity\GeneralSetting'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipezbo_generalsettingbundle_generalsetting';
    }
}
