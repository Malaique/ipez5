<?php

namespace ipezbo\MailSettingBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MailSettingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('transport')
            ->add('host')
            ->add('port')
            ->add('username')
            ->add('password', 'password')
            ->add('usedMailSetting', 'mail')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\MailSettingBundle\Entity\MailSetting'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipezbo_mailsettingbundle_mailsetting';
    }
}
