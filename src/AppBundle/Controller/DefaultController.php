<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DateTime;
use DateTimeZone;

class DefaultController extends Controller {

    /**
     * @Route("/parrilla", name="home")
     */
    public function indexActixon() {
        $promosManager = $this->container->get('app.promos.manager');
        $promos = $promosManager->getPromosByWeek();
        $time_diff = $this->getDiffHour();
        $params = array(
            'promosPerWeek' => $promos,
            'timeDiff' => $time_diff
        );
        return $this->render('default/index.html.twig', $params);
    }

    /**
     * @Route("/view/{id}", name="promo")
     */
    public function promoAction($id) {

        $promosManager = $this->container->get('app.promos.manager');

        $promo = $promosManager->getPromo($id);

        if (!is_null($promo)) {
            $name = $promo->getPlayer();

            if ($promosManager->hasPlayer($name)) {
                $promosManager->addView($this->getUser(), $id);


                $params = array(
                    'promo' => $promo,
                    'player' => $promosManager->getPlayerPromo($id),
                    'pixel' => $this->getPixel($id)
                );
                return $this->render('default/promo.html.twig', $params);
            }
        }




        throw new NotFoundHttpException();
    }

    private function getPixel($promo) {
        $user = $this->getUser();
        return array(
            'email' => $user->getEmail(),
            'promo' => $promo
        );
    }

    private function getDiffHour() {
        $time_zones = array(
            "Buenos_Aires" => "America/Argentina/Buenos_Aires",
            "Nueva_York" => "America/New_York",
            "Mexico" => "America/Mexico_City",
        );
        $date_Madrid = new DateTime('now', new DateTimeZone("Europe/Madrid"));
        $hourMadrid = date_format($date_Madrid, 'H');
        $time_diff = array();
        foreach ($time_zones as $zone => $time_zone) {
            $date = new DateTime('now', new DateTimeZone($time_zone));
            $hourZone = date_format($date, 'H');
            $diff = $hourZone - $hourMadrid;
            $time_diff[$zone] = $diff;
        }
        return $time_diff;
    }

}
