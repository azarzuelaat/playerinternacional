<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ImageType extends AbstractType {

        public function setDefaultOptions(OptionsResolverInterface $resolver) {
                $resolver->setDefaults(array(
                    'asset' => null,
                    'width' => 100,
                    'height' => 100
                ));
        }

        public function buildView(FormView $view, FormInterface $form, array $options) {

                $view->vars = array_replace($view->vars, array(
                    'placeholder' => null,
                    'asset' => $options['asset'],
                    'width' => $options['width'],
                    'height' => $options['height'],
                ));
        }

        public function getParent() {
                return 'file';
        }

        public function getName() {
                return 'image';
        }

}
