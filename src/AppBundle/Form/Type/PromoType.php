<?php

namespace AppBundle\Form\Type;

use AppBundle\Form\I18nType;
use AppBundle\Form\ImageType;
use AppBundle\Form\SufixType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromoType extends AbstractType {

        /**
         * @param FormBuilderInterface $builder
         * @param array $options
         */
        public function buildForm(FormBuilderInterface $builder, array $options) {

                $thumb = isset($options['data']) ? $options['data']->getWebImage() : false;


                $builder
                        ->add('title', new I18nType(), array(
                            'label' => 'form.title'
                        ))
                        ->add('summary', new I18nType(), array(
                            'label' => 'form.summary',
                            'widget'=>'textarea'
                        ))
                        ->add('url', 'text', array(
                            'label' => 'form.video',
                        ))
                        ->add('file', new ImageType(), array(
                            'label' => 'form.image',
                            'asset' => $thumb,
                            'required' => false,
                            'width' => 200,
                            'height' => 115
                        ))
                        ->add('year', 'integer', array(
                            'label' => 'form.year'
                        ))
                        ->add('diary', 'checkbox', array(
                            'label' => 'form.diary',
                            'required' => false
                        ))                        
                        ->add('seasons', 'integer', array(
                            'label' => 'form.seasons'
                        ))
                        ->add('episodes', 'integer', array(
                            'label' => 'form.episodes'
                        ))
                        ->add('duration', 'integer', array(
                            'label' => 'form.duration'
                        ))
                        ->add('day', 'choice', array(
                            'label' => 'form.day',
                            'multiple'=>true,
                            'expanded'=>true,
                            'choices' => array(
                                'monday' => 'monday',
                                'tuesday' => 'tuesday',
                                'wednesday' => 'wednesday',
                                'thursday' => 'thursday',
                                'friday' => 'friday',
                                'saturday' => 'saturday',
                                'sunday' => 'sunday',
                            )
                        ))
                        ->add('time', 'time', array(
                            'label' => 'form.time',
                        ))
                        ->add('ratio', 'text', array(
                            'label' => 'form.ratio',
                        ))
                        ->add('channel', 'choice', array(
                            'label' => 'form.channel',
                            'choices' => array(
                                'telecinco' => 'telecinco',
                                'cuatro' => 'cuatro',
                                'factoria_de_ficcion' => 'factoria de ficción',
                                'boing' => 'boing',
                                'divinity' => 'divinity',
                                'energy' => 'energy',
                            )
                        ))
                        ->add('language', 'choice', array(
                            'label' => 'form.language',
                            'choices' => array(
                                'spanish' => 'spanish',
                                'english' => 'english',
                            )                            
                        ))
                        ->add('cuote', new SufixType(), array(
                            'label' => 'form.cuote',
                            'required' => false,
                            'sufix'=>'form.percent'
                        ))
                        ->add('viewers', new SufixType(), array(
                            'label' => 'form.viewers',
                            'required' => false,
                            'sufix'=>'form.millions'
                            
                        ))
                        ->add('website', 'url', array(
                            'label' => 'form.website',
                            'required' => false
                        ))
                        ->add('facebook', 'url', array(
                            'label' => 'form.facebook',
                            'required' => false
                        ))
                        ->add('twitter', 'url', array(
                            'label' => 'form.twitter',
                            'required' => false
                        ))
                        ->add('store', 'url', array(
                            'label' => 'form.store',
                            'required' => false
                        ))
                        ->add('send', 'submit', array(
                            'label' => 'form.save',
                        ))
                ;
        }

        /**
         * @param OptionsResolverInterface $resolver
         */
        public function setDefaultOptions(OptionsResolverInterface $resolver) {
                $resolver->setDefaults(array(
                    'data_class' => 'AppBundle\Entity\Promo'
                ));
        }

        /**
         * @return string
         */
        public function getName() {
                return 'promo';
        }

}
