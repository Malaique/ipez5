<?php

namespace ipezbo\NewsletterBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsletterType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subject', 'text', array(
                    'label' => 'Sujet',
                    'attr' => array(
                        'placeholder' => 'Sujet du mail',)))
            ->add('message', 'textarea', array(
                    'label' => 'Corps',
                    'attr' => array(
                        'placeholder' => 'Contenu du mail',)))
            ->add('expeditorEmail', 'email', array(
                    'label' => 'Expéditeur',
                    'attr' => array(
                        'placeholder' => 'Adresse email expéditeur',)))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\NewsletterBundle\Entity\Newsletter'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipezbo_newsletterbundle_newsletter';
    }
}
