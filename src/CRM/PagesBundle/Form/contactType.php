<?php

namespace CRM\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class contactType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstname', 'text', array('attr' => array('class' => 'form-control')))
                ->add('lastname', 'text', array('attr' => array('class' => 'form-control')))              
                ->add('gender', 'choice', array(
                    'choices' => array('Femme' => 'Femme', 'Homme' => 'Homme'),
                    'translation_domain' => 'PagesBundle',
                    'attr' => array('style' => 'width:100%')
                ))
                ->add('function', 'choice', array(
                    'choices' => array('CEO' => 'CEO', 'Directeur' => 'Directeur'
                        , 'Salarié' => 'Salarié', 'Stagiaire' => 'Stagiaire', 'Autre' => 'Autre'),
                    'translation_domain' => 'PagesBundle',
                    'attr' => array('style' => 'width:100%')
                ))
                ->add('address', 'text', array('attr' => array('class' => 'form-control')))
                ->add('city', 'text', array('attr' => array('class' => 'form-control')))
                ->add('country', 'text', array('attr' => array('class' => 'form-control')))
                ->add('phone', 'text', array('attr' => array('class' => 'form-control')))
                ->add('email', 'email', array('attr' => array('class' => 'form-control')))
             
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CRM\PagesBundle\Entity\contact'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'crm_pagesbundle_contact';
    }

}
