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
 * Description of PromosProvider
 *
 * @author jmpantoja
 */
class PromosProvider {

        private $players = array();
        private $promos = array();
        private $users = array();

        /**
         *
         * @var Router 
         */
        private $router;

        /**
         *
         * @var RequestStack
         */
        private $request;

        /**
         *
         * @var EntityManager 
         */
        private $doctrine;

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

        public function getDoctrine() {
                return $this->doctrine;
        }

        public function setDoctrine(EntityManager $doctrine) {
                $this->doctrine = $doctrine;
                return $this;
        }

        public function getRequest() {
                return $this->request;
        }

        public function setRequest(RequestStack $request) {
                $this->request = $request;
                return $this;
        }

        public function getPromosKeys() {
                return array_keys($this->getPromos());
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

        public function getPromosByWeek() {
                $promos = array();
                $week = array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');


                foreach ($this->getPromos() as $key => $promo) {
                        $days = $promo->getDay();
                        
                        foreach ($days as $day) {
                                $promos[$day][$key] = $promo;
                        }
                }

                foreach ($promos as &$promosByDay) {
                        uasort($promosByDay, function($itemA, $itemB) {
                                
                                $timeA = $itemA->getNormalizeTime();
                                $timeB = $itemB->getNormalizeTime();
                                
                                return $timeA > $timeB;
                        });
                }

                $sortPromos = array();
                foreach ($week as $dayName) {
                        if (isset($promos[$dayName])) {
                                $sortPromos[$dayName] = $promos[$dayName];
                        } else {
                                $sortPromos[$dayName] = array();
                        }
                }

                return $sortPromos;
        }
        
        public function getPlayerLive($name) {
                if ($this->hasPlayer($name)) {
                        $router = $this->getRouter();

                        $config = $this->getPlayer($name);
                        $config['name'] = $name;
                        $config['config'] = $router->generate('config_live', array('player' => $name));
                        return $config;
                } else {
                        throw new NotFoundHttpException();
                }
        }

          public function getPlayerPromo($id) {

                $promo = $this->getPromo($id);
                if (!is_null($promo)) {
                        $name = $promo->getPlayer();

                        if ($this->hasPlayer($name)) {
                                $router = $this->getRouter();

                                $config = $this->getPlayer($name);
                                $config['name'] = $name;
                                $config['config'] = $router->generate('config_promo', array('id' => $id));
                                return $config;
                        }
                }

                throw new NotFoundHttpException();
        }

        public function getPagination($page) {

                $doctrine = $this->getDoctrine();

                $queryBuilder = $doctrine->createQueryBuilder()
                        ->select('p')
                        ->from('AppBundle:Promo', 'p')
                        ->innerJoin('p.translations', 't')                        
                        
                        ->orderBy('t.content', 'ASC')
                        ->where('t.field = ?1')
                        ->andWhere('t.locale = ?2')
                ;
                $queryBuilder->setParameters(array(1=>'title', 2=>$this->getLocale()));

                $adapter = new DoctrineORMAdapter($queryBuilder);

                $pager = new Pagerfanta($adapter);
                $pager->setCurrentPage($page);
                return $pager;
        }

        public function savePromo(Promo $promo) {
                $doctrine = $this->getDoctrine();
                $doctrine->persist($promo);
                $doctrine->flush();

                return $promo;
        }

        public function deletePromo(Promo $promo) {
                $doctrine = $this->getDoctrine();
                $doctrine->remove($promo);
                $doctrine->flush();

                return $promo;
        }

        public function getPromo($id) {
                $doctrine = $this->getDoctrine();

                $promo = $doctrine->getRepository('AppBundle:Promo')->find($id);
                return $promo;
        }

        public function getPromos() {
                if (empty($this->promos)) {
                        $doctrine = $this->getDoctrine();
                        $this->promos = $doctrine->getRepository('AppBundle:Promo')->findAll();
                }
                return $this->promos;
        }

        public function getStatsByUser($id) {

                $doctrine = $this->getDoctrine();

                $query = $doctrine->createQueryBuilder()
                        ->select('count(s.id) as total, s.promo')
                        ->from('AppBundle:Stats', 's')
                        ->where('s.user = :user')
                        ->groupBy('s.promo')
                        ->getQuery()
                ;

                $result = $query->execute(array('user' => $id));

                $data = array();
                foreach ($result as $item) {
                        $name = $item['promo'];
                        $total = $item['total'];
                        $data[$name] = $total;
                }

                $values = array();
                foreach ($this->getPromos() as $promo) {
                        $id = $promo->getId();
                        $name = $promo->getTitle($this->getLocale());

                        $values[$name] = isset($data[$id]) ? (int) $data[$id] : 0;
                }

                $values['directo'] = isset($data[0]) ? (int) $data[0] : 0;

                return $values;
        }

        public function getStatsByPromo($id) {

                $doctrine = $this->getDoctrine();

                $query = $doctrine->createQueryBuilder()
                        ->select('count(s.id) as total, s.user')
                        ->from('AppBundle:Stats', 's')
                        ->where('s.promo = :promo')
                        ->groupBy('s.user')
                        ->getQuery()
                ;

                $result = $query->execute(array('promo' => $id));

                $data = array();
                foreach ($result as $item) {
                        $name = $item['user'];
                        $total = $item['total'];
                        $data[$name] = $total;
                }

                foreach ($this->getUsers() as $user) {
                        $id = $user->getId();
                        $name = $user->getUsername();
                        $values[$name] = isset($data[$id]) ? (int) $data[$id] : 0;
                }


                return $values;
        }

        public function addView(User $user, $contentId) {
                $stats = new Stats();
                $stats->setUser($user->getId());
                $stats->setPromo($contentId);
                $stats->setDate(new DateTime());

                $doctrine = $this->getDoctrine();
                $doctrine->persist($stats);
                $doctrine->flush();
        }

        public function getUsers() {
                if (empty($this->users)) {
                        $doctrine = $this->getDoctrine();
                        $this->users = $doctrine->getRepository('AppBundle:User')->findAll();
                }
                return $this->users;
        }

        public function getUser($id) {
                $doctrine = $this->getDoctrine();
                return $doctrine->getRepository('AppBundle:User')->findOneBy(array('id' => $id));
        }

        public function getLocale() {
                $request = $this->getRequest()->getCurrentRequest();
                return $request->getLocale();
        }
        


}
