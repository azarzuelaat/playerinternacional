<?php

namespace AppBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface {

        /**
         * {@inheritDoc}
         */
        public function getConfigTreeBuilder() {


                $treeBuilder = new TreeBuilder();

                $rootNode = $treeBuilder->root('app');

                $node = $rootNode->children();
                $this->configPromos($node);
                $this->configPlayers($node);
                $rootNode->end();

                return $treeBuilder;
        }

        private function configPromos($node) {
                $node->arrayNode('promos')
                        ->prototype('array')
                        ->beforeNormalization()
                        ->ifString()
                        ->then(function($v) {
                                return array('type' => $v);
                        })
                        ->end()
                        ->treatNullLike(array())
                        ->treatFalseLike(array('mapping' => false))
                        ->performNoDeepMerging()
                        ->children()
                        ->scalarNode('player')    //para cargar el player
                        ->defaultValue('telecinco')
                        ->end()
                        ->scalarNode('url')    //el path al video (por ejemplo: /nogeo/2014/12/08/MDSVID20141208_0092-0.mp4)
                        ->defaultValue(null)
                        ->end()
                        ->scalarNode('image')    //url del thumg
                        ->defaultValue(null)
                        ->end()
                        ->scalarNode('title')   //el titulo del programa
                        ->defaultValue('title')
                        ->end()
                        ->scalarNode('summary') //la entradilla
                        ->defaultValue('summary')
                        ->end()
                        ->scalarNode('year') //año de producción
                        ->defaultValue(2000)
                        ->end()
                        ->scalarNode('seasons') //temporadas
                        ->defaultValue(1)
                        ->end()
                        ->scalarNode('episodes') //episodios
                        ->defaultValue(10)
                        ->end()
                        ->scalarNode('duration')
                        ->defaultValue(0)
                        ->end()                                
                        ->scalarNode('ratio') //aspecto (16:9)
                        ->defaultValue('16:9')
                        ->end()
                        ->scalarNode('language') 
                        ->defaultValue('español')
                        ->end()
                        ->scalarNode('channel') 
                        ->defaultValue('telecinco')
                        ->end()
                        ->arrayNode('audience')
                             ->addDefaultsIfNotSet()
                             ->children()
                                 ->scalarNode('cuote')
                                     ->defaultValue(null)
                                 ->end()
                                 ->scalarNode('total')
                                     ->defaultValue(null)
                                 ->end()
                             ->end()
                        ->end()                    
                        ->scalarNode('website') 
                        ->defaultValue(null)
                        ->end()
                        ->scalarNode('facebook') 
                        ->defaultValue(null)
                        ->end()
                        ->scalarNode('twitter') 
                        ->defaultValue(null)
                        ->end()
                        ->scalarNode('store')   //ventas internacionales
                        ->defaultValue(null)
                        ->end()
                        ->enumNode('day')
                                ->values(array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'))
                        ->defaultValue('monday')
                        ->end()
                        ->scalarNode('time')
                        ->defaultValue('06:00')
                        ->end()
                        ->end()
                        ->end()
                        ->end();
        }
        private function configPlayers($node) {
                $node->arrayNode('players')
                        ->useAttributeAsKey('name')
                        ->prototype('array')
                        ->beforeNormalization()
                        ->ifString()
                        ->then(function($v) {
                                return array('type' => $v);
                        })
                        ->end()
                        ->treatNullLike(array())
                        ->treatFalseLike(array('mapping' => false))
                        ->performNoDeepMerging()
                        ->children()
                                ->scalarNode('url')
                                ->defaultValue('http://static1.tele-cinco.net/comun/swf/playerTele5.swf')
                                ->end()
                                ->scalarNode('background')
                                ->defaultValue('http://telecincostatic-a.akamaihd.net/masdetelecinco/Directo-telecincoes_MDSIMA20111027_0289_1.png')
                                ->end()
                                ->scalarNode('autoplay')
                                ->defaultValue('true')
                                ->end()
                                ->scalarNode('title')
                                ->defaultValue('true')
                                ->end()
                                ->scalarNode('subtitle')
                                ->defaultValue('true')
                                ->end()
                                ->scalarNode('scrubbing')
                                ->defaultValue('false')
                                ->end()
                                ->scalarNode('rtmp')
                                ->defaultValue('true')
                                ->end()
                                ->scalarNode('channel')
                                ->defaultValue('internacional')
                                ->end()
                        ->end()
                        ->end()
                        ->end();
        }

}
