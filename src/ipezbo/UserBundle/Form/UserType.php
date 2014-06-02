<?php

namespace ipezbo\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name')
                ->add('surname')
                ->add('username')
                ->add('usernameCanonical')
                ->add('email')
                ->add('emailCanonical')
                ->add('enabled')
                ->add('salt')
                ->add('password')
                ->add('lastLogin')
                ->add('locked')
                ->add('expired')
                ->add('expiresAt')
                ->add('confirmationToken')
                ->add('passwordRequestedAt')
                ->add('roles')
                ->add('credentialsExpired')
                ->add('credentialsExpireAt')

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\UserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipezbo_userbundle_user';
    }

}
