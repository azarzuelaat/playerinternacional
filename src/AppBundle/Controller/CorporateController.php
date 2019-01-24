<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CorporateController extends Controller {

        /**
         * @Route("/corporate", name="corporate")
         */
        public function indexAction() {
            $playerProvider = $this->container->get('app.player.provider');
            $language  =$this->container->get('request')->getLocale();
            
          
                if($language=="es"){
                    $video =$playerProvider->getPlayerCorprorate('corporateEs');
                    $url ="/nogeo/mediasat/Mediasat_Institucional_Espanol_v04_mbr_.mp4";
                }else{
                    $video =$playerProvider->getPlayerCorprorate('corporateEn');
                    $url ="/nogeo/mediasat/Mediasat_Institucional_English_v04_mbr_.mp4";
                }
          
            
            $params = array(
                 'url' => $url,
                 'somos' => array('video'=>$video,'url'=>$url),
                 'vive' => array('video'=>$playerProvider->getPlayerCorprorate('corporate2'),'url'=>'/nogeo/mediasat/Mediasat_Programacion_mbr_.mp4'),
                 'series' => array('video' =>$playerProvider->getPlayerCorprorate('corporate3'), 'url'=>'/nogeo/mediasat/Promo_MEDIASAT_series_mbr_.mp4'),
                 'programa' => array('video' =>$playerProvider->getPlayerCorprorate('corporate4'), 'url'=>'/nogeo/mediasat/Mediasat_Programas_mbr_.mp4'),
                 'presentadores' => array('video' =>$playerProvider->getPlayerCorprorate('corporate5'), 'url'=>'/nogeo/mediasat/presentadores-cincomas_mbr_.mp4'),
                 'estrenos' => array('video' =>$playerProvider->getPlayerCorprorate('corporate6'), 'url'=>'/nogeo/mediasat/estrenos-cincomas_mbr_.mp4'),
                 'background'=> "images/cartela.jpg"
                 );
            
             return $this->render('corporate/index.html.twig',$params);
                
        }

}
