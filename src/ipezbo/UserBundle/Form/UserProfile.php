<?php

namespace ipezbo\UserBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProfile extends BaseType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add('name');
        $builder->add('surname');
        $builder->add('email');
        //parent::buildForm($builder, $options);
    }

    public function getName() {
        return 'ipezbo_userbundle_user_profile';
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\UserBundle\Entity\User'
        ));
    }

}