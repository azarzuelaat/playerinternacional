<?php

namespace AppBundle\Service;

use AppBundle\Entity\Promo;
use AppBundle\Entity\Stats;
use AppBundle\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManager;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Description of PlayerProvider
 *
 */
class PlayerProvider {

        private $players = array();

        /**
         *
         * @var Router 
         */
        private $router;

        public function __construct(array $players) {
                $this->players = $players;
        }
        
        public function setRouter(Router $router) {
                $this->router = $router;
                return $this;
        }

        public function getRouter() {
                return $this->router;
        }
        
        public function getPlayer($name) {
                if ($this->hasPlayer($name)) {
                        return $this->players[$name];
                }
                return array();
        }

        public function hasPlayer($name) {
                return isset($this->players[$name]);
        }

        public function getPlayerCorprorate($videoid) {
                $name = 'internacional';
                if ($this->hasPlayer($name)) {
                        $router = $this->getRouter();                        
                        
                        $config = $this->getPlayer($name);
                        $config['name'] = $name;
                        $config['config'] = $router->generate('config_corporate', array('videoid' => $videoid));
                        return $config;
                } else {
                        throw new NotFoundHttpException();
                }
        }
        
        public function getLocale() {
                $request = $this->getRequest()->getCurrentRequest();
                return $request->getLocale();
        }
        


}
