<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ConfigController extends Controller {

    /**
     * @Route("/config/live/{player}", name="config_live", defaults={"player":"internacional"})
     */
    public function configLiveAction($player) {
        $promosManager = $this->container->get('app.promos.manager');
        $config = $promosManager->getPlayer($player);

        if (!is_null($config)) {
            $response = new Response();
            $response->headers->set('Content-Type', 'xml');
            $params = $config;
            $params['player'] = $player;

            return $this->render('config/live.xml.twig', $params, $response);
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @Route("/config/promo/{id}", name="config_promo")
     */
    public function configPromoAction($id) {
        $promosManager = $this->container->get('app.promos.manager');

        $promo = $promosManager->getPromo($id);
        if (!is_null($promo)) {
            $name = $promo->getPlayer();
            if ($promosManager->hasPlayer($name)) {
                $response = new Response();
                $response->headers->set('Content-Type', 'xml');

                $params = $promosManager->getPlayer($name);
                $params['channel'] = $promo->getUrl();
                return $this->render('config/promo.xml.twig', $params, $response);
            }
        }

        throw new NotFoundHttpException();
    }

    /**
     * @Route("/config/corporate/{videoid}", name="config_corporate")
     */
    public function configCorporateAction($videoid) {
        $playerProvider = $this->container->get('app.player.provider');
        
        switch ($videoid) {
        case "corporateEn" :
            $urlVideo ="/nogeo/mediasat/Mediasat_Institucional_English_v04_mbr_.mp4";
            break;
         case "corporateEs" :
            $urlVideo ="/nogeo/mediasat/Mediasat_Institucional_Espanol_v04_mbr_.mp4";
            break;
       
        case "corporate2" :
            $urlVideo = "/nogeo/mediasat/Mediasat_Programacion_mbr_.mp4";
            break;
        case "corporate3" :
            $urlVideo = "/nogeo/mediasat/Promo_MEDIASAT_series_mbr_.mp4";
            break;
        
        case "corporate4" :
            $urlVideo = "/nogeo/mediasat/Mediasat_Programas_mbr_.mp4";
            break;

        case "corporate5" :
            $urlVideo = "/nogeo/mediasat/presentadores-cincomas_mbr_.mp4";
            break;
        
        case "corporate6" :
            $urlVideo = "/nogeo/mediasat/estrenos-cincomas_mbr_.mp4";
            break; 
        
        }
            
        $name = 'internacional';
        if ($playerProvider->hasPlayer($name)) {
            $response = new Response();
            $response->headers->set('Content-Type', 'xml');

            $params = $playerProvider->getPlayer($name);
            $params['channel'] = $urlVideo;
            return $this->render('config/promo.xml.twig', $params, $response);
        }
    }

}
