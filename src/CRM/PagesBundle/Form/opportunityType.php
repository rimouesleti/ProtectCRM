<?php

namespace CRM\PagesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class opportunityType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text', array('attr' => array('class' => 'form-control')))
                ->add('statut', 'choice', array(
                    'choices' => array('ouvert' => 'ouvert', 'clôturé - gagné' => 'clôturé - gagné', 'clôturé - perdu' => 'clôturé - perdu'),
                    'translation_domain' => 'PagesBundle',
                    'attr' => array('style' => 'width:100%')
                ))
                ->add('step', 'text', array('attr' => array('class' => 'form-control')))
                ->add('margin', 'text', array('attr' => array('class' => 'form-control')))
                ->add('ca', 'text', array('attr' => array('class' => 'form-control')))
                ->add('comment', 'textarea', array(
                    'attr' => array('class' => 'form-control'),
                    'required' => false))
                ->add('lost_comment', 'textarea', array(
                    'attr' => array('class' => 'form-control'),
                    'required' => false))
                ->add('entity')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CRM\PagesBundle\Entity\opportunity'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'crm_pagesbundle_opportunity';
    }

}
