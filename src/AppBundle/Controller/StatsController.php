<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StatsController extends Controller {

        /**
         * @Route("/stats/user/{id}", name="stats_user")
         */
        public function userAction($id) {
                $manager = $this->container->get('app.promos.manager');

                $data = $manager->getStatsByUser($id);
                $user = $manager->getUser($id);

                $title = $user->getUsername();
                $options = $this->createOptions($title, $data, 'promos');
                $params = array(
                    'options' => json_encode($options)
                );

                return $this->render('stats/barchar.html.twig', $params);
        }

        /**
         * @Route("/stats/promo/{id}", name="stats_promo")
         */
        public function promoAction($id) {
                $manager = $this->container->get('app.promos.manager');

                $promo = $manager->getPromo($id);

                if (!is_null($promo)) {
                        $data = $manager->getStatsByPromo($id);
                        $title = $promo->getTitle($this->getLocale());
                        $options = $this->createOptions($title, $data, 'usuarios');
                        $params = array(
                            'options' => json_encode($options)
                        );

                        return $this->render('stats/barchar.html.twig', $params);
                } else {
                        throw new NotFoundHttpException();
                }
        }

        private function createOptions($title, $data, $xAxis) {
                $options = array(
                    'chart' => array(
                        'renderTo' => 'statics',
                        'type' => 'bar'
                    ),
                    'title' => array(
                        'text' => $title
                    ),
                    'xAxis' => array(
                        'categories' => array_keys($data),
                        'title' => array(
                            'text' => $xAxis
                        )
                    ),
                    'yAxis' => array(
                        'allowDecimals' => false,
                        'min' => 0,
                        'title' => array(
                            'text' => 'vistas',
                            'align' => 'high',
                        )
                    ),
                    'credits' => array(
                        'enabled' => false
                    ),
                    'series' => array(
                        array(
                            'name' => ' nº de vistas',
                            'data' => array_values($data)
                        )
                    )
                );
                return $options;
        }

        public function getLocale() {
                $request = $this->get('request');
                return $request->getLocale();
        }

}
