<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InfoType extends AbstractType {

        /**
         * @param FormBuilderInterface $builder
         * @param array $options
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {
                $builder
                        ->add('title', 'text', array(
                            'label' => 'form.title'
                        ))
                        ->add('linkHref', 'url', array(
                            'label' => 'form.href'
                        ))
                        ->add('linkAnchor', 'text', array(
                            'label' => 'form.anchor',
                            'required'=>false
                        ))
                        ->add('send', 'submit', array(
                            'label' => 'form.save',
                ));
        }

        /**
         * @param OptionsResolverInterface $resolver
         */
        public function setDefaultOptions(OptionsResolverInterface $resolver) {
                $resolver->setDefaults(array(
                    'data_class' => 'AppBundle\Entity\Info'
                ));
        }

        /**
         * @return string
         */
        public function getName() {
                return 'info';
        }

}
