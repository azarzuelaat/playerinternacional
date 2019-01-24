<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType {

        private $showPassword = false;
        private $showRol = false;

        public function getShowPassword() {
                return $this->showPassword;
        }

        public function getShowRol() {
                return $this->showRol;
        }

        public function setShowPassword($showPassword) {
                $this->showPassword = $showPassword;
                return $this;
        }

        public function setShowRol($showRol) {
                $this->showRol = $showRol;
                return $this;
        }

        public function buildForm(FormBuilderInterface $builder, array $options) {
                $builder
                        ->add('username', 'text', array(
                            'label' => 'form.username'
                        ))
                        ->add('email', 'email', array(
                            'label' => 'form.email'
                ));

                if ($this->getShowPassword()) {
                        $builder->add('password', 'password');

                        $builder->add('password', 'repeated', array(
                            'type' => 'password',
                            'invalid_message' => 'error.password',
                            'required' => true,
                            'first_options' => array('label' => 'form.password'),
                            'second_options' => array('label' => 'form.repeat_password'),
                        ));
                }

                if ($this->getShowRol()) {
                        $builder->add('rol', 'choice', array(
                            'choices' => array(
                                'ROLE_USER' => 'USER',
                                'ROLE_ADMIN' => 'ADMIN',
                                'ROLE_SUPERADMIN' => 'ROOT',
                            )
                        ));
                }

                $builder->add('send', 'submit', array(
                    'label' => 'form.save',
                ));
        }

        public function getName() {
                return 'task';
        }

}
