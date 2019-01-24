<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/assetic')) {
            if (0 === strpos($pathinfo, '/assetic/estilos')) {
                // _assetic_estilos
                if ($pathinfo === '/assetic/estilos.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'estilos',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_estilos',);
                }

                if (0 === strpos($pathinfo, '/assetic/estilos_')) {
                    // _assetic_estilos_0
                    if ($pathinfo === '/assetic/estilos_reset_1.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'estilos',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_estilos_0',);
                    }

                    // _assetic_estilos_1
                    if ($pathinfo === '/assetic/estilos_estilos_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'estilos',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_estilos_1',);
                    }

                    // _assetic_estilos_2
                    if ($pathinfo === '/assetic/estilos_parrilla_3.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'estilos',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_estilos_2',);
                    }

                    // _assetic_estilos_3
                    if ($pathinfo === '/assetic/estilos_form_4.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'estilos',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_estilos_3',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/assetic/javascript')) {
                // _assetic_javascript
                if ($pathinfo === '/assetic/javascript.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'javascript',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_javascript',);
                }

                if (0 === strpos($pathinfo, '/assetic/javascript_')) {
                    if (0 === strpos($pathinfo, '/assetic/javascript_jquery')) {
                        // _assetic_javascript_0
                        if ($pathinfo === '/assetic/javascript_jquery.min_1.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'javascript',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_javascript_0',);
                        }

                        // _assetic_javascript_1
                        if ($pathinfo === '/assetic/javascript_jquery-ui.min_2.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'javascript',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_javascript_1',);
                        }

                        // _assetic_javascript_2
                        if ($pathinfo === '/assetic/javascript_jquery.cookie.min_3.js') {
                            return array (  '_controller' => 'assetic.controller:render',  'name' => 'javascript',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_javascript_2',);
                        }

                    }

                    // _assetic_javascript_3
                    if ($pathinfo === '/assetic/javascript_app_4.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => 'javascript',  'pos' => 3,  '_format' => 'js',  '_route' => '_assetic_javascript_3',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/css/0f8b103')) {
            // _assetic_0f8b103
            if ($pathinfo === '/css/0f8b103.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '0f8b103',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_0f8b103',);
            }

            // _assetic_0f8b103_0
            if ($pathinfo === '/css/0f8b103_part_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '0f8b103',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_0f8b103_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/c6739e9')) {
            // _assetic_c6739e9
            if ($pathinfo === '/js/c6739e9.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'c6739e9',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_c6739e9',);
            }

            // _assetic_c6739e9_0
            if ($pathinfo === '/js/c6739e9_part_1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'c6739e9',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_c6739e9_0',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/e')) {
            // es__RG__fos_user_security_login
            if ($pathinfo === '/es/login') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_security_login',);
            }

            // en__RG__fos_user_security_login
            if ($pathinfo === '/en/login') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_security_login',);
            }

            // es__RG__fos_user_security_check
            if ($pathinfo === '/es/login_check') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_es__RG__fos_user_security_check;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_security_check',);
            }
            not_es__RG__fos_user_security_check:

            // en__RG__fos_user_security_check
            if ($pathinfo === '/en/login_check') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_en__RG__fos_user_security_check;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_security_check',);
            }
            not_en__RG__fos_user_security_check:

            // es__RG__fos_user_security_logout
            if ($pathinfo === '/es/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_security_logout',);
            }

            // en__RG__fos_user_security_logout
            if ($pathinfo === '/en/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_security_logout',);
            }

            // es__RG__fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/es/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_es__RG__fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'es__RG__fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_profile_show',);
            }
            not_es__RG__fos_user_profile_show:

            // en__RG__fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/en/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_en__RG__fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'en__RG__fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_profile_show',);
            }
            not_en__RG__fos_user_profile_show:

            // es__RG__fos_user_profile_edit
            if ($pathinfo === '/es/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_profile_edit',);
            }

            // en__RG__fos_user_profile_edit
            if ($pathinfo === '/en/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_profile_edit',);
            }

            // es__RG__fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/es/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'es__RG__fos_user_registration_register');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_registration_register',);
            }

            // en__RG__fos_user_registration_register
            if (rtrim($pathinfo, '/') === '/en/register') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'en__RG__fos_user_registration_register');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_registration_register',);
            }

            // es__RG__fos_user_registration_check_email
            if ($pathinfo === '/es/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_es__RG__fos_user_registration_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_registration_check_email',);
            }
            not_es__RG__fos_user_registration_check_email:

            // en__RG__fos_user_registration_check_email
            if ($pathinfo === '/en/register/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_en__RG__fos_user_registration_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_registration_check_email',);
            }
            not_en__RG__fos_user_registration_check_email:

            // es__RG__fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/es/register/confirm') && preg_match('#^/es/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_es__RG__fos_user_registration_confirm;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',  '_locale' => 'es',));
            }
            not_es__RG__fos_user_registration_confirm:

            // en__RG__fos_user_registration_confirm
            if (0 === strpos($pathinfo, '/en/register/confirm') && preg_match('#^/en/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_en__RG__fos_user_registration_confirm;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',  '_locale' => 'en',));
            }
            not_en__RG__fos_user_registration_confirm:

            // es__RG__fos_user_registration_confirmed
            if ($pathinfo === '/es/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_es__RG__fos_user_registration_confirmed;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_registration_confirmed',);
            }
            not_es__RG__fos_user_registration_confirmed:

            // en__RG__fos_user_registration_confirmed
            if ($pathinfo === '/en/register/confirmed') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_en__RG__fos_user_registration_confirmed;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_registration_confirmed',);
            }
            not_en__RG__fos_user_registration_confirmed:

            // es__RG__fos_user_resetting_request
            if ($pathinfo === '/es/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_es__RG__fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_resetting_request',);
            }
            not_es__RG__fos_user_resetting_request:

            // en__RG__fos_user_resetting_request
            if ($pathinfo === '/en/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_en__RG__fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_resetting_request',);
            }
            not_en__RG__fos_user_resetting_request:

            // es__RG__fos_user_resetting_send_email
            if ($pathinfo === '/es/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_es__RG__fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_resetting_send_email',);
            }
            not_es__RG__fos_user_resetting_send_email:

            // en__RG__fos_user_resetting_send_email
            if ($pathinfo === '/en/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_en__RG__fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_resetting_send_email',);
            }
            not_en__RG__fos_user_resetting_send_email:

            // es__RG__fos_user_resetting_check_email
            if ($pathinfo === '/es/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_es__RG__fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_resetting_check_email',);
            }
            not_es__RG__fos_user_resetting_check_email:

            // en__RG__fos_user_resetting_check_email
            if ($pathinfo === '/en/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_en__RG__fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_resetting_check_email',);
            }
            not_en__RG__fos_user_resetting_check_email:

            // es__RG__fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/es/resetting/reset') && preg_match('#^/es/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_es__RG__fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  '_locale' => 'es',));
            }
            not_es__RG__fos_user_resetting_reset:

            // en__RG__fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/en/resetting/reset') && preg_match('#^/en/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_en__RG__fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',  '_locale' => 'en',));
            }
            not_en__RG__fos_user_resetting_reset:

            // es__RG__fos_user_change_password
            if ($pathinfo === '/es/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_es__RG__fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_locale' => 'es',  '_route' => 'es__RG__fos_user_change_password',);
            }
            not_es__RG__fos_user_change_password:

            // en__RG__fos_user_change_password
            if ($pathinfo === '/en/profile/change-password') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_en__RG__fos_user_change_password;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_locale' => 'en',  '_route' => 'en__RG__fos_user_change_password',);
            }
            not_en__RG__fos_user_change_password:

            // es__RG__config_live
            if (0 === strpos($pathinfo, '/es/config/live') && preg_match('#^/es/config/live(?:/(?P<player>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__config_live')), array (  'player' => 'internacional',  '_controller' => 'AppBundle\\Controller\\ConfigController::configLiveAction',  '_locale' => 'es',));
            }

            // en__RG__config_live
            if (0 === strpos($pathinfo, '/en/config/live') && preg_match('#^/en/config/live(?:/(?P<player>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__config_live')), array (  'player' => 'internacional',  '_controller' => 'AppBundle\\Controller\\ConfigController::configLiveAction',  '_locale' => 'en',));
            }

            // es__RG__config_promo
            if (0 === strpos($pathinfo, '/es/config/promo') && preg_match('#^/es/config/promo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__config_promo')), array (  '_controller' => 'AppBundle\\Controller\\ConfigController::configPromoAction',  '_locale' => 'es',));
            }

            // en__RG__config_promo
            if (0 === strpos($pathinfo, '/en/config/promo') && preg_match('#^/en/config/promo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__config_promo')), array (  '_controller' => 'AppBundle\\Controller\\ConfigController::configPromoAction',  '_locale' => 'en',));
            }

            // es__RG__config_corporate
            if (0 === strpos($pathinfo, '/es/config/corporate') && preg_match('#^/es/config/corporate/(?P<videoid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__config_corporate')), array (  '_controller' => 'AppBundle\\Controller\\ConfigController::configCorporateAction',  '_locale' => 'es',));
            }

            // en__RG__config_corporate
            if (0 === strpos($pathinfo, '/en/config/corporate') && preg_match('#^/en/config/corporate/(?P<videoid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__config_corporate')), array (  '_controller' => 'AppBundle\\Controller\\ConfigController::configCorporateAction',  '_locale' => 'en',));
            }

            // es__RG__corporate
            if ($pathinfo === '/es/corporate') {
                return array (  '_controller' => 'AppBundle\\Controller\\CorporateController::indexAction',  '_locale' => 'es',  '_route' => 'es__RG__corporate',);
            }

            // en__RG__corporate
            if ($pathinfo === '/en/corporate') {
                return array (  '_controller' => 'AppBundle\\Controller\\CorporateController::indexAction',  '_locale' => 'en',  '_route' => 'en__RG__corporate',);
            }

            // es__RG__home
            if ($pathinfo === '/es/parrilla') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexActixon',  '_locale' => 'es',  '_route' => 'es__RG__home',);
            }

            // en__RG__home
            if ($pathinfo === '/en/parrilla') {
                return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexActixon',  '_locale' => 'en',  '_route' => 'en__RG__home',);
            }

            // es__RG__promo
            if (0 === strpos($pathinfo, '/es/view') && preg_match('#^/es/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__promo')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::promoAction',  '_locale' => 'es',));
            }

            // en__RG__promo
            if (0 === strpos($pathinfo, '/en/view') && preg_match('#^/en/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__promo')), array (  '_controller' => 'AppBundle\\Controller\\DefaultController::promoAction',  '_locale' => 'en',));
            }

            // es__RG__legal
            if ($pathinfo === '/es/legal.html') {
                return array (  'num' => 'uno',  '_controller' => 'AppBundle\\Controller\\LegalController::indexAction',  '_locale' => 'es',  '_route' => 'es__RG__legal',);
            }

            // en__RG__legal
            if ($pathinfo === '/en/legal.html') {
                return array (  'num' => 'uno',  '_controller' => 'AppBundle\\Controller\\LegalController::indexAction',  '_locale' => 'en',  '_route' => 'en__RG__legal',);
            }

            // es__RG__legal_list
            if (0 === strpos($pathinfo, '/es/legal/list') && preg_match('#^/es/legal/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__legal_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\LegalController::listAction',  '_locale' => 'es',));
            }

            // en__RG__legal_list
            if (0 === strpos($pathinfo, '/en/legal/list') && preg_match('#^/en/legal/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__legal_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\LegalController::listAction',  '_locale' => 'en',));
            }

            // es__RG__legal_new
            if ($pathinfo === '/es/legal/new') {
                return array (  '_controller' => 'AppBundle\\Controller\\LegalController::newAction',  '_locale' => 'es',  '_route' => 'es__RG__legal_new',);
            }

            // en__RG__legal_new
            if ($pathinfo === '/en/legal/new') {
                return array (  '_controller' => 'AppBundle\\Controller\\LegalController::newAction',  '_locale' => 'en',  '_route' => 'en__RG__legal_new',);
            }

            // es__RG__legal_edit
            if (0 === strpos($pathinfo, '/es/legal/edit') && preg_match('#^/es/legal/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__legal_edit')), array (  '_controller' => 'AppBundle\\Controller\\LegalController::editAction',  '_locale' => 'es',));
            }

            // en__RG__legal_edit
            if (0 === strpos($pathinfo, '/en/legal/edit') && preg_match('#^/en/legal/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__legal_edit')), array (  '_controller' => 'AppBundle\\Controller\\LegalController::editAction',  '_locale' => 'en',));
            }

            // es__RG__legal_delete
            if (0 === strpos($pathinfo, '/es/legal/delete') && preg_match('#^/es/legal/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__legal_delete')), array (  '_controller' => 'AppBundle\\Controller\\LegalController::deleteAction',  '_locale' => 'es',));
            }

            // en__RG__legal_delete
            if (0 === strpos($pathinfo, '/en/legal/delete') && preg_match('#^/en/legal/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__legal_delete')), array (  '_controller' => 'AppBundle\\Controller\\LegalController::deleteAction',  '_locale' => 'en',));
            }

            // es__RG__live
            if (0 === strpos($pathinfo, '/es/live') && preg_match('#^/es/live(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__live')), array (  'name' => 'internacional',  '_controller' => 'AppBundle\\Controller\\LiveController::indexAction',  '_locale' => 'es',));
            }

            // en__RG__live
            if (0 === strpos($pathinfo, '/en/live') && preg_match('#^/en/live(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__live')), array (  'name' => 'internacional',  '_controller' => 'AppBundle\\Controller\\LiveController::indexAction',  '_locale' => 'en',));
            }

            // es__RG__config_ooyala
            if (0 === strpos($pathinfo, '/es/config/player/ooyala') && preg_match('#^/es/config/player/ooyala(?:/(?P<live>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__config_ooyala')), array (  'live' => 'internacional',  '_controller' => 'AppBundle\\Controller\\LiveController::configLive',  '_locale' => 'es',));
            }

            // en__RG__config_ooyala
            if (0 === strpos($pathinfo, '/en/config/player/ooyala') && preg_match('#^/en/config/player/ooyala(?:/(?P<live>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__config_ooyala')), array (  'live' => 'internacional',  '_controller' => 'AppBundle\\Controller\\LiveController::configLive',  '_locale' => 'en',));
            }

            // es__RG__config_ooyala_skin
            if (0 === strpos($pathinfo, '/es/config/player/ooyala/skin') && preg_match('#^/es/config/player/ooyala/skin(?:/(?P<live>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__config_ooyala_skin')), array (  'live' => 'internacional',  '_controller' => 'AppBundle\\Controller\\LiveController::configLiveSkin',  '_locale' => 'es',));
            }

            // en__RG__config_ooyala_skin
            if (0 === strpos($pathinfo, '/en/config/player/ooyala/skin') && preg_match('#^/en/config/player/ooyala/skin(?:/(?P<live>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__config_ooyala_skin')), array (  'live' => 'internacional',  '_controller' => 'AppBundle\\Controller\\LiveController::configLiveSkin',  '_locale' => 'en',));
            }

            // es__RG__promos_list
            if (0 === strpos($pathinfo, '/es/promos/list') && preg_match('#^/es/promos/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__promos_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\PromoController::indexAction',  '_locale' => 'es',));
            }

            // en__RG__promos_list
            if (0 === strpos($pathinfo, '/en/promos/list') && preg_match('#^/en/promos/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__promos_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\PromoController::indexAction',  '_locale' => 'en',));
            }

            // es__RG__promos_new
            if ($pathinfo === '/es/promos/new') {
                return array (  '_controller' => 'AppBundle\\Controller\\PromoController::newAction',  '_locale' => 'es',  '_route' => 'es__RG__promos_new',);
            }

            // en__RG__promos_new
            if ($pathinfo === '/en/promos/new') {
                return array (  '_controller' => 'AppBundle\\Controller\\PromoController::newAction',  '_locale' => 'en',  '_route' => 'en__RG__promos_new',);
            }

            // es__RG__promos_edit
            if (0 === strpos($pathinfo, '/es/promos/edit') && preg_match('#^/es/promos/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__promos_edit')), array (  '_controller' => 'AppBundle\\Controller\\PromoController::editAction',  '_locale' => 'es',));
            }

            // en__RG__promos_edit
            if (0 === strpos($pathinfo, '/en/promos/edit') && preg_match('#^/en/promos/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__promos_edit')), array (  '_controller' => 'AppBundle\\Controller\\PromoController::editAction',  '_locale' => 'en',));
            }

            // es__RG__promos_delete
            if (0 === strpos($pathinfo, '/es/promos/delete') && preg_match('#^/es/promos/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__promos_delete')), array (  '_controller' => 'AppBundle\\Controller\\PromoController::deleteAction',  '_locale' => 'es',));
            }

            // en__RG__promos_delete
            if (0 === strpos($pathinfo, '/en/promos/delete') && preg_match('#^/en/promos/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__promos_delete')), array (  '_controller' => 'AppBundle\\Controller\\PromoController::deleteAction',  '_locale' => 'en',));
            }

            // es__RG__stats_user
            if (0 === strpos($pathinfo, '/es/stats/user') && preg_match('#^/es/stats/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__stats_user')), array (  '_controller' => 'AppBundle\\Controller\\StatsController::userAction',  '_locale' => 'es',));
            }

            // en__RG__stats_user
            if (0 === strpos($pathinfo, '/en/stats/user') && preg_match('#^/en/stats/user/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__stats_user')), array (  '_controller' => 'AppBundle\\Controller\\StatsController::userAction',  '_locale' => 'en',));
            }

            // es__RG__stats_promo
            if (0 === strpos($pathinfo, '/es/stats/promo') && preg_match('#^/es/stats/promo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__stats_promo')), array (  '_controller' => 'AppBundle\\Controller\\StatsController::promoAction',  '_locale' => 'es',));
            }

            // en__RG__stats_promo
            if (0 === strpos($pathinfo, '/en/stats/promo') && preg_match('#^/en/stats/promo/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__stats_promo')), array (  '_controller' => 'AppBundle\\Controller\\StatsController::promoAction',  '_locale' => 'en',));
            }

            // es__RG__users_list
            if (0 === strpos($pathinfo, '/es/users/list') && preg_match('#^/es/users/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__users_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\UserController::listAction',  '_locale' => 'es',));
            }

            // en__RG__users_list
            if (0 === strpos($pathinfo, '/en/users/list') && preg_match('#^/en/users/list(?:/(?P<page>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__users_list')), array (  'page' => 1,  '_controller' => 'AppBundle\\Controller\\UserController::listAction',  '_locale' => 'en',));
            }

            // es__RG__users_new
            if ($pathinfo === '/es/users/new') {
                return array (  '_controller' => 'AppBundle\\Controller\\UserController::newAction',  '_locale' => 'es',  '_route' => 'es__RG__users_new',);
            }

            // en__RG__users_new
            if ($pathinfo === '/en/users/new') {
                return array (  '_controller' => 'AppBundle\\Controller\\UserController::newAction',  '_locale' => 'en',  '_route' => 'en__RG__users_new',);
            }

            // es__RG__users_edit
            if (0 === strpos($pathinfo, '/es/users/edit') && preg_match('#^/es/users/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__users_edit')), array (  '_controller' => 'AppBundle\\Controller\\UserController::editAction',  '_locale' => 'es',));
            }

            // en__RG__users_edit
            if (0 === strpos($pathinfo, '/en/users/edit') && preg_match('#^/en/users/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__users_edit')), array (  '_controller' => 'AppBundle\\Controller\\UserController::editAction',  '_locale' => 'en',));
            }

            // es__RG__users_delete
            if (0 === strpos($pathinfo, '/es/users/delete') && preg_match('#^/es/users/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'es__RG__users_delete')), array (  '_controller' => 'AppBundle\\Controller\\UserController::deleteAction',  '_locale' => 'es',));
            }

            // en__RG__users_delete
            if (0 === strpos($pathinfo, '/en/users/delete') && preg_match('#^/en/users/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'en__RG__users_delete')), array (  '_controller' => 'AppBundle\\Controller\\UserController::deleteAction',  '_locale' => 'en',));
            }

            // es__RG__root
            if (rtrim($pathinfo, '/') === '/es') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'es__RG__root');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'home',  'permanent' => true,  '_locale' => 'es',  '_route' => 'es__RG__root',);
            }

            // en__RG__root
            if (rtrim($pathinfo, '/') === '/en') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'en__RG__root');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'home',  'permanent' => true,  '_locale' => 'en',  '_route' => 'en__RG__root',);
            }

        }

        // _twig_error_test
        if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
