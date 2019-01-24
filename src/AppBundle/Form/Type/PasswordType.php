<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PasswordType extends AbstractType {

        public function buildForm(FormBuilderInterface $builder, array $options) {
                $builder
                        ->add('current', 'password', array(
                            'label' => 'form.password'
                        ))
                        ->add('password', 'repeated', array(
                            'type' => 'password',
                            'invalid_message' => 'Las contraseñas no coinciden.',
                            'required' => true,
                            'first_options' => array('label' => 'form.new_password'),
                            'second_options' => array('label' => 'form.repeat_password'),
                        ))
                        ->add('send', 'submit', array(
                            'label' => 'form.save',
                        ))
                ;
        }

        public function getName() {
                return 'pass';
        }

}
