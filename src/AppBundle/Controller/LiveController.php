<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class LiveController extends Controller {

        /**
         * @Route("/live/{name}", name="live", defaults={"name":"internacional"})
         */
        public function indexAction($name) {
                $promosManager = $this->container->get('app.promos.manager');
                //$env = $this->container->getParameter('kernel.environment');
                 
                $pathPlayer = "http://player.mediaset.es/MSPlayer/";
                //$pathPlayer = "http://zoidberg.pre.3d99a4cb092e6d20ff56d80b9efd9a8f8802ec81.es:9909/MSPlayer/";
                
                //No funciona correctamente la recuperacion del entorno, esta puesto a pelo en el index y app_dev el entorno, simpre es pro o dev
                /*if ( $env != "prod") {
                   $pathPlayer = "http://zoidberg.int.3d99a4cb092e6d20ff56d80b9efd9a8f8802ec81.es:9909";
                   
                } else {
                    
                   $pathPlayer = "http://player.mediaset.es"; 
                }*/
            
                if ($promosManager->hasPlayer($name)) {
                    $promosManager->addView($this->getUser(), 0);
                        
                        $params = array(
                            'player' => $promosManager->getPlayerLive($name),
                            'msplayerjs' => $pathPlayer."js/msplayer.min.js",
                            'cryptojs' => $pathPlayer."js/cryptojs-3.1.2.js",
                            'msplayerCSS' => $pathPlayer."css/msplayer.min.css",
                            'msplayerPath' => $pathPlayer,
                            'pixel' => array(
                               'email' => $this->getUser()->getEmail()
                            )
                        );

                        return $this->render('live/index.html.twig', $params);
                } else {
                        throw new NotFoundHttpException();
                }
        }
        
            /**
     * @Route("/config/player/ooyala/{live}", name="config_ooyala")
     */
    public function configLive($live = "internacional") {

              $var = array('mediaType' => 'video',
           
            'watermark' =>
            array(
               
                'position' => 'TR',
            ),
            'skin' =>
            array(
                'backgroundColor' => '#05BBED',
                'config'=> '',
            ),
            'isLive' => true,            
            'services' =>
            array(
               /*'mmc' => 'http://52.48.147.6:8080/mmc-player/api/mmc/v1/bemad/live/html5.json',   */              
                'mmc' => 'http://indalo.mediaset.es/mmc-player/api/mmc/v1/cincomas/live/flash.json',
            )
        );
        
         $response = new Response(json_encode($var));
         $response->headers->set('Content-Type', 'application/json');

     return $response;
        
    }
    
                /**
     * @Route("/config/player/ooyala/skin/{live}", name="config_ooyala_skin")
     */
    public function configLiveSkin($live = "internacional") {
$json = array(
            'general' =>
            array(
                'watermark' =>
                array(
                    'imageResource' =>
                    array(
                        'url' => '//player.ooyala.com/static/v4/stable/4.5.5/skin-plugin/assets/images/ooyala-watermark.png',
                        'androidResource' => 'logo',
                        'iosResource' => 'logo',
                    ),
                ),
                'loadingImage' =>
                array(
                    'imageResource' =>
                    array(
                        'url' => 'http://player.tele-cinco.net/comun/MSPlayer/images/spinner.png',
                    ),
                ),
            ),
            'localization' =>
            array(
                'defaultLanguage' => 'es',
                'availableLanguageFile' =>
                array(
                    0 =>
                    array(
                        'language' => 'en',
                        'languageFile' => '//player.ooyala.com/static/v4/stable/4.5.5/skin-plugin/en.json',
                        'androidResource' => 'skin-config/en.json',
                        'iosResource' => 'en',
                    ),
                    1 =>
                    array(
                        'language' => 'es',
                        'languageFile' => '//player.ooyala.com/static/v4/stable/4.5.5/skin-plugin/es.json',
                        'androidResource' => 'skin-config/es.json',
                        'iosResource' => 'es',
                    ),
                    2 =>
                    array(
                        'language' => 'zh',
                        'languageFile' => '//player.ooyala.com/static/v4/stable/4.5.5/skin-plugin/zh.json',
                        'androidResource' => 'skin-config/zh.json',
                        'iosResource' => 'zh',
                    ),
                ),
            ),
            'responsive' =>
            array(
                'breakpoints' =>
                array(
                    'xs' =>
                    array(
                        'id' => 'xs',
                        'name' => 'oo-xsmall',
                        'maxWidth' => 559,
                        'multiplier' => 0.6999999999999999555910790149937383830547332763671875,
                    ),
                    'sm' =>
                    array(
                        'id' => 'sm',
                        'name' => 'oo-small',
                        'minWidth' => 560,
                        'maxWidth' => 839,
                        'multiplier' => 1,
                    ),
                    'md' =>
                    array(
                        'id' => 'md',
                        'name' => 'oo-medium',
                        'minWidth' => 840,
                        'maxWidth' => 1279,
                        'multiplier' => 1,
                    ),
                    'lg' =>
                    array(
                        'id' => 'lg',
                        'name' => 'oo-large',
                        'minWidth' => 1280,
                        'multiplier' => 1.1999999999999999555910790149937383830547332763671875,
                    ),
                ),
                'aspectRatio' => 'auto',
            ),
            'startScreen' =>
            array(
                'promoImageSize' => 'default',
                'showPlayButton' => true,
                'playButtonPosition' => 'center',
                'playIconStyle' =>
                array(
                    'color' =>'white',
                    'opacity' => 1,
                ),
                'showTitle' => true,
                'showDescription' => true,
                'titleFont' =>
                array(
                    'color' => 'white',
                ),
                'descriptionFont' =>
                array(
                    'color' => 'white',
                ),
                'infoPanelPosition' => 'topLeft',
                'showPromo' => true,
            ),
            'pauseScreen' =>
            array(
                'showPauseIcon' => true,
                'pauseIconPosition' => 'center',
                'PauseIconStyle' =>
                array(
                    'color' => 'white',
                    'opacity' => 1,
                ),
                'showTitle' => true,
                'showDescription' => true,
                'infoPanelPosition' => 'topLeft',
                'screenToShowOnPause' => 'default',
            ),
            'endScreen' =>
            array(
                'screenToShowOnEnd' => 'discovery',
                'showReplayButton' => true,
                'replayIconStyle' =>
                array(
                    'color' => 'white',
                    'opacity' => 1,
                ),
            ),
            'adScreen' =>
            array(
                'showAdMarquee' => true,
                'showControlBar' => false,
            ),
            'discoveryScreen' =>
            array(
                'panelTitle' =>
                array(
                    'titleFont' =>
                    array(
                        'fontSize' => 28,
                        'fontFamily' => 'Roboto Condensed',
                        'color' => 'white',
                    ),
                ),
                'contentTitle' =>
                array(
                    'show' => true,
                    'font' =>
                    array(
                        'fontSize' => 22,
                        'fontFamily' => 'Roboto Condensed',
                        'color' => 'white',
                    ),
                ),
                'contentDuration' =>
                array(
                    'show' => true,
                    'font' =>
                    array(
                        'fontSize' => 12,
                        'fontFamily' => 'Arial-BoldMT',
                        'color' => 'white',
                    ),
                ),
                'showCountDownTimerOnEndScreen' => true,
                'countDownTime' => '10',
            ),
            'shareScreen' =>
            array(
                'embed' =>
                array(
                    'source' => '',
                ),
            ),
            'moreOptionsScreen' =>
            array(
                'brightOpacity' => 1,
                'darkOpacity' => 0.40000000000000002220446049250313080847263336181640625,
                'iconSize' => 30,
                'color' => 'white',
                'iconStyle' =>
                array(
                    'active' =>
                    array(
                        'color' => '#FFFFFF',
                        'opacity' => 1,
                    ),
                    'inactive' =>
                    array(
                        'color' => '#FFFFFF',
                        'opacity' => 0.9499999999999999555910790149937383830547332763671875,
                    ),
                ),
            ),
            'closedCaptionOptions' =>
            array(
                'defaultEnabled' => true,
                'defaultLanguage' => 'en',
                'defaultTextColor' => 'White',
                'defaultWindowColor' => 'Transparent',
                'defaultBackgroundColor' => 'Black',
                'defaultTextOpacity' => 1,
                'defaultBackgroundOpacity' => 0.59999999999999997779553950749686919152736663818359375,
                'defaultWindowOpacity' => 0,
                'defaultFontType' => 'Proportional Sans-Serif',
                'defaultFontSize' => 'Medium',
                'defaultTextEnhancement' => 'Uniform',
            ),
            'upNext' =>
            array(
                'showUpNext' => true,
                'timeToShow' => '10',
            ),
            'controlBar' =>
            array(
                'volumeControl' =>
                array(
                    'color' => '#FFFFFF',
                ),
                'iconStyle' =>
                array(
                    'active' =>
                    array(
                        'color' => '#FFFFFF',
                        'opacity' => 1,
                    ),
                    'inactive' =>
                    array(
                        'color' => '#FFFFFF',
                        'opacity' => 0.9499999999999999555910790149937383830547332763671875,
                    ),
                ),
                'autoHide' => true,
                'height' => 60,
                'logo' =>
                array(
                    'imageResource' =>
                    array(
                        'url' => '//player.ooyala.com/static/v4/stable/4.5.5/skin-plugin/assets/images/ooyala-logo.svg',
                        'androidResource' => 'logo',
                        'iosResource' => 'logo',
                    ),
                    'clickUrl' => 'http://www.ooyala.com',
                    'target' => '_blank',
                    'width' => 96,
                    'height' => 24,
                ),
                'adScrubberBar' =>
                array(
                    'backgroundColor' => 'rgba(175,175,175,1)',
                    'bufferedColor' => 'rgba(127,127,127,1)',
                    'playedColor' => 'rgba(255,63,128,1)',
                ),
                'scrubberBar' =>
                array(
                    'backgroundColor' => '#e0e0e0',
                    'bufferedColor' => '#d0d0d0',
                    'playedColor' => 'rgba(67,137,255,1)',
                    'thumbnailPreview' => true,
                ),
            ),
            'live' =>
            array(
                'forceDvrDisabled' => true,
            ),
            'buttons' =>
            array(
                'desktopContent' =>
                array(
                    0 =>
                    array(
                        'name' => 'playPause',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                    1 =>
                    array(
                        'name' => 'volume',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 240,
                    ),
                    2 =>
                    array(
                        'name' => 'live',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                    3 =>
                    array(
                        'name' => 'timeDuration',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'drop',
                        'minWidth' => 145,
                    ),
                    4 =>
                    array(
                        'name' => 'flexibleSpace',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 1,
                    ),
                    5 =>
                    array(
                        'name' => 'share',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'moveToMoreOptions',
                        'minWidth' => 45,
                    ),
                    6 =>
                    array(
                        'name' => 'discovery',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'moveToMoreOptions',
                        'minWidth' => 45,
                    ),
                    7 =>
                    array(
                        'name' => 'closedCaption',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'moveToMoreOptions',
                        'minWidth' => 45,
                    ),
                    8 =>
                    array(
                        'name' => 'quality',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'moveToMoreOptions',
                        'minWidth' => 45,
                    ),
                    9 =>
                    array(
                        'name' => 'logo',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 125,
                    ),
                    10 =>
                    array(
                        'name' => 'fullscreen',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                    11 =>
                    array(
                        'name' => 'moreOptions',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                ),
                'desktopAd' =>
                array(
                    0 =>
                    array(
                        'name' => 'playPause',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                    1 =>
                    array(
                        'name' => 'volume',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 240,
                    ),
                    2 =>
                    array(
                        'name' => 'flexibleSpace',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 1,
                    ),
                    3 =>
                    array(
                        'name' => 'logo',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 125,
                    ),
                    4 =>
                    array(
                        'name' => 'fullscreen',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                    5 =>
                    array(
                        'name' => 'moreOptions',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                ),
                'mobileContent' =>
                array(
                    0 =>
                    array(
                        'name' => 'volume',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 50,
                    ),
                    1 =>
                    array(
                        'name' => 'live',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 45,
                    ),
                    2 =>
                    array(
                        'name' => 'timeDuration',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'drop',
                        'minWidth' => 100,
                    ),
                    3 =>
                    array(
                        'name' => 'flexibleSpace',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 1,
                    ),
                    4 =>
                    array(
                        'name' => 'share',
                        'location' => 'moreOptions',
                    ),
                    5 =>
                    array(
                        'name' => 'discovery',
                        'location' => 'moreOptions',
                    ),
                    6 =>
                    array(
                        'name' => 'closedCaption',
                        'location' => 'moreOptions',
                    ),
                    7 =>
                    array(
                        'name' => 'fullscreen',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 50,
                    ),
                    8 =>
                    array(
                        'name' => 'moreOptions',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 50,
                    ),
                ),
                'mobileAd' =>
                array(
                    0 =>
                    array(
                        'name' => 'volume',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 50,
                    ),
                    1 =>
                    array(
                        'name' => 'flexibleSpace',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 1,
                    ),
                    2 =>
                    array(
                        'name' => 'fullscreen',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 50,
                    ),
                    3 =>
                    array(
                        'name' => 'moreOptions',
                        'location' => 'controlBar',
                        'whenDoesNotFit' => 'keep',
                        'minWidth' => 50,
                    ),
                ),
            ),
            'icons' =>
            array(
                'play' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'h',
                    'fontStyleClass' => 'oo-icon oo-icon-play-slick',
                ),
                'pause' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'g',
                    'fontStyleClass' => 'oo-icon oo-icon-pause-slick',
                ),
                'volume' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'b',
                    'fontStyleClass' => 'oo-icon oo-icon-volume-on-ooyala-defualt',
                ),
                'volumeOff' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'p',
                    'fontStyleClass' => 'oo-icon oo-icon-volume-mute-ooyala-defualt',
                ),
                'expand' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'i',
                    'fontStyleClass' => 'oo-icon oo-icon-system-fullscreen',
                ),
                'compress' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'j',
                    'fontStyleClass' => 'oo-icon oo-icon-system-minimizescreen',
                ),
                'ellipsis' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'f',
                    'fontStyleClass' => 'oo-icon oo-icon-system-menu',
                ),
                'replay' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'c',
                    'fontStyleClass' => 'oo-icon oo-icon-system-replay',
                ),
                'share' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'o',
                    'fontStyleClass' => 'oo-icon oo-icon-share',
                ),
                'cc' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'k',
                    'fontStyleClass' => 'oo-icon oo-icon-cc',
                ),
                'discovery' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'l',
                    'fontStyleClass' => 'oo-icon oo-icon-discovery-binoculars',
                ),
                'quality' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'm',
                    'fontStyleClass' => 'oo-icon oo-icon-bitrate',
                ),
                'setting' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'n',
                    'fontStyleClass' => 'oo-icon oo-icon-system-settings',
                ),
                'dismiss' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'e',
                    'fontStyleClass' => 'oo-icon oo-icon-system-close',
                ),
                'toggleOn' =>
                array(
                    'fontFamilyName' => 'fontawesome',
                    'fontString' => '',
                    'fontStyleClass' => '',
                ),
                'toggleOff' =>
                array(
                    'fontFamilyName' => 'fontawesome',
                    'fontString' => '',
                    'fontStyleClass' => '',
                ),
                'left' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'r',
                    'fontStyleClass' => 'oo-icon oo-icon-system-left-arrow',
                ),
                'right' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 's',
                    'fontStyleClass' => 'oo-icon oo-icon-system-right-arrow',
                ),
                'learn' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 't',
                    'fontStyleClass' => 'oo-icon oo-icon-system-more-information',
                ),
                'skip' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'u',
                    'fontStyleClass' => 'oo-icon oo-icon-skip-slick',
                ),
                'warning' =>
                array(
                    'fontFamilyName' => 'fontawesome',
                    'fontString' => '',
                    'fontStyleClass' => '',
                ),
                'auto' =>
                array(
                    'fontFamilyName' => 'ooyala-slick-type',
                    'fontString' => 'd',
                    'fontStyleClass' => 'oo-icon oo-icon-system-auto',
                ),
            ),
        );
        
         $response = new Response(json_encode($json));
         $response->headers->set('Content-Type', 'application/json');

     return $response;
        
    }

}
