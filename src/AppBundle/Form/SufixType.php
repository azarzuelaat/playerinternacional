<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SufixType extends AbstractType {

        public function setDefaultOptions(OptionsResolverInterface $resolver) {
                $resolver->setDefaults(array(
                    'sufix' => '',
                ));
        }

        public function buildView(FormView $view, FormInterface $form, array $options) {
                
                $view->vars = array_replace($view->vars, array(
                    'placeholder' => null,
                    'sufix' => $options['sufix'],
                ));
        }

        public function getParent() {
                return 'text';
        }

        public function getName() {
                return 'sufix';
        }

}
