<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class I18nType extends AbstractType {

        public function setDefaultOptions(OptionsResolverInterface $resolver) {
                $resolver->setDefaults(array(
                    'widget' => 'text',
                ));
        }

        public function buildView(FormView $view, FormInterface $form, array $options) {
                
                $view->vars = array_replace($view->vars, array(
                    'placeholder' => null,
                    'widget' => $options['widget'],
                ));
        }

        public function getParent() {
                return 'text';
        }

        public function getName() {
                return 'i18n';
        }

}
