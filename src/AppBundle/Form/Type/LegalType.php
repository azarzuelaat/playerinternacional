<?php

namespace AppBundle\Form\Type;

use AppBundle\Form\I18nType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LegalType extends AbstractType {

        /**
         * @param FormBuilderInterface $builder
         * @param array $options
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {
                $builder
                        ->add('number', 'integer', array(
                            'label' => 'form.order'
                        ))
                        ->add('name', 'text', array(
                            'label' => 'form.name'
                        ))
                        ->add('text', 'ckeditor', array(
                            'label' => 'form.text'
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
                    'data_class' => 'AppBundle\Entity\Legal'
                ));
        }

        /**
         * @return string
         */
        public function getName() {
                return 'legal';
        }

}
