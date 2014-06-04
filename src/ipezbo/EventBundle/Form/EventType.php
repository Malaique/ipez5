<?php

namespace ipezbo\EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $order = "ASC";
        $builder
                ->add('name')
                ->add('description')
                ->add('street')
                ->add('city')
                ->add('zipCode')
                ->add('additionalDetails')
                ->add('coordinatesLatitude')
                ->add('coordinatesLongitude')
                ->add('startEvent', 'datetime', array(
                    'years' => range(2014, date('Y')+5),
                    'label' => 'Début de l\'évènement',
                ))
                ->add('endEvent', 'datetime', array(
                    'years' => range(2014, date('Y')+5),
                    'label' => 'Fin de l\'évènement',
                    'attr' => array('class' => 'date-picker')
                ))
                ->add('backgroundColor')
                ->add('newsletter', 'entity', array(
                    'class' => 'ipezboNewsletterBundle:Newsletter',
                    'property' => 'subject',
                    'multiple' => false,
                    'attr' => array(
                        'class' => 'form-control'),
                    'query_builder' => function(\ipezbo\NewsletterBundle\Entity\NewsletterRepository $r) use ($order) {
                return $r->getNewsletterByOrder($order);
            }))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ipezbo\EventBundle\Entity\Event'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ipezbo_eventbundle_event';
    }

}
