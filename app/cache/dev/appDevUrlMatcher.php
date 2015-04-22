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

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/regions')) {
            // regions
            if (rtrim($pathinfo, '/') === '/regions') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'regions');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::indexAction',  '_route' => 'regions',);
            }

            // regions_show
            if (preg_match('#^/regions/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'regions_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::showAction',));
            }

            // regions_new
            if ($pathinfo === '/regions/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::newAction',  '_route' => 'regions_new',);
            }

            // regions_create
            if ($pathinfo === '/regions/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_regions_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::createAction',  '_route' => 'regions_create',);
            }
            not_regions_create:

            // regions_edit
            if (preg_match('#^/regions/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'regions_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::editAction',));
            }

            // regions_update
            if (preg_match('#^/regions/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_regions_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'regions_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::updateAction',));
            }
            not_regions_update:

            // regions_delete
            if (preg_match('#^/regions/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_regions_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'regions_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\RegionsController::deleteAction',));
            }
            not_regions_delete:

        }

        if (0 === strpos($pathinfo, '/c')) {
            if (0 === strpos($pathinfo, '/countinformation')) {
                // countinformation
                if (rtrim($pathinfo, '/') === '/countinformation') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'countinformation');
                    }

                    return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::indexAction',  '_route' => 'countinformation',);
                }

                // countinformation_show
                if (preg_match('#^/countinformation/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'countinformation_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::showAction',));
                }

                // countinformation_new
                if ($pathinfo === '/countinformation/new') {
                    return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::newAction',  '_route' => 'countinformation_new',);
                }

                // countinformation_create
                if ($pathinfo === '/countinformation/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_countinformation_create;
                    }

                    return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::createAction',  '_route' => 'countinformation_create',);
                }
                not_countinformation_create:

                // countinformation_edit
                if (preg_match('#^/countinformation/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'countinformation_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::editAction',));
                }

                // countinformation_update
                if (preg_match('#^/countinformation/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_countinformation_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'countinformation_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::updateAction',));
                }
                not_countinformation_update:

                // countinformation_delete
                if (preg_match('#^/countinformation/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_countinformation_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'countinformation_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CountInformationController::deleteAction',));
                }
                not_countinformation_delete:

            }

            if (0 === strpos($pathinfo, '/calladitionalinfo')) {
                // calladitionalinfo
                if (rtrim($pathinfo, '/') === '/calladitionalinfo') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'calladitionalinfo');
                    }

                    return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::indexAction',  '_route' => 'calladitionalinfo',);
                }

                // calladitionalinfo_show
                if (preg_match('#^/calladitionalinfo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calladitionalinfo_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::showAction',));
                }

                // calladitionalinfo_new
                if ($pathinfo === '/calladitionalinfo/new') {
                    return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::newAction',  '_route' => 'calladitionalinfo_new',);
                }

                // calladitionalinfo_create
                if ($pathinfo === '/calladitionalinfo/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_calladitionalinfo_create;
                    }

                    return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::createAction',  '_route' => 'calladitionalinfo_create',);
                }
                not_calladitionalinfo_create:

                // calladitionalinfo_edit
                if (preg_match('#^/calladitionalinfo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calladitionalinfo_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::editAction',));
                }

                // calladitionalinfo_update
                if (preg_match('#^/calladitionalinfo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_calladitionalinfo_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calladitionalinfo_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::updateAction',));
                }
                not_calladitionalinfo_update:

                // calladitionalinfo_delete
                if (preg_match('#^/calladitionalinfo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_calladitionalinfo_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'calladitionalinfo_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallAditionalInfoController::deleteAction',));
                }
                not_calladitionalinfo_delete:

            }

        }

        if (0 === strpos($pathinfo, '/usercall')) {
            // usercall
            if (rtrim($pathinfo, '/') === '/usercall') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'usercall');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::indexAction',  '_route' => 'usercall',);
            }

            // usercall_show
            if (preg_match('#^/usercall/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercall_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::showAction',));
            }

            // usercall_new
            if ($pathinfo === '/usercall/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::newAction',  '_route' => 'usercall_new',);
            }

            // usercall_create
            if ($pathinfo === '/usercall/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_usercall_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::createAction',  '_route' => 'usercall_create',);
            }
            not_usercall_create:

            // usercall_edit
            if (preg_match('#^/usercall/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercall_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::editAction',));
            }

            // usercall_update
            if (preg_match('#^/usercall/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_usercall_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercall_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::updateAction',));
            }
            not_usercall_update:

            // usercall_delete
            if (preg_match('#^/usercall/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_usercall_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usercall_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserCallController::deleteAction',));
            }
            not_usercall_delete:

        }

        if (0 === strpos($pathinfo, '/callinfo')) {
            // callinfo
            if (rtrim($pathinfo, '/') === '/callinfo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'callinfo');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::indexAction',  '_route' => 'callinfo',);
            }

            // callinfo_show
            if (preg_match('#^/callinfo/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'callinfo_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::showAction',));
            }

            // callinfo_new
            if ($pathinfo === '/callinfo/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::newAction',  '_route' => 'callinfo_new',);
            }

            // callinfo_create
            if ($pathinfo === '/callinfo/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_callinfo_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::createAction',  '_route' => 'callinfo_create',);
            }
            not_callinfo_create:

            // callinfo_edit
            if (preg_match('#^/callinfo/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'callinfo_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::editAction',));
            }

            // callinfo_update
            if (preg_match('#^/callinfo/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_callinfo_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'callinfo_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::updateAction',));
            }
            not_callinfo_update:

            // callinfo_delete
            if (preg_match('#^/callinfo/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_callinfo_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'callinfo_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallInfoController::deleteAction',));
            }
            not_callinfo_delete:

        }

        if (0 === strpos($pathinfo, '/users')) {
            // users
            if (rtrim($pathinfo, '/') === '/users') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'users');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::indexAction',  '_route' => 'users',);
            }

            // users_show
            if (preg_match('#^/users/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::showAction',));
            }

            // users_new
            if ($pathinfo === '/users/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::newAction',  '_route' => 'users_new',);
            }

            // users_create
            if ($pathinfo === '/users/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_users_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::createAction',  '_route' => 'users_create',);
            }
            not_users_create:

            // users_edit
            if (preg_match('#^/users/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::editAction',));
            }

            // users_update
            if (preg_match('#^/users/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_users_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::updateAction',));
            }
            not_users_update:

            // users_delete
            if (preg_match('#^/users/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_users_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'users_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::deleteAction',));
            }
            not_users_delete:

            // users_token
            if ($pathinfo === '/users/token') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_users_token;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::tokenAction',  '_route' => 'users_token',);
            }
            not_users_token:

            // users_calls
            if ($pathinfo === '/users/calls') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_users_calls;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::callsAction',  '_route' => 'users_calls',);
            }
            not_users_calls:

            // users_info
            if ($pathinfo === '/users/info') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_users_info;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\UserController::infoAction',  '_route' => 'users_info',);
            }
            not_users_info:

        }

        if (0 === strpos($pathinfo, '/filter')) {
            // filter
            if (rtrim($pathinfo, '/') === '/filter') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'filter');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::indexAction',  '_route' => 'filter',);
            }

            // filter_show
            if (preg_match('#^/filter/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'filter_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::showAction',));
            }

            // filter_new
            if ($pathinfo === '/filter/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::newAction',  '_route' => 'filter_new',);
            }

            // filter_create
            if ($pathinfo === '/filter/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_filter_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::createAction',  '_route' => 'filter_create',);
            }
            not_filter_create:

            // filter_edit
            if (preg_match('#^/filter/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'filter_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::editAction',));
            }

            // filter_update
            if (preg_match('#^/filter/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_filter_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'filter_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::updateAction',));
            }
            not_filter_update:

            // filter_delete
            if (preg_match('#^/filter/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_filter_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'filter_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::deleteAction',));
            }
            not_filter_delete:

            // filter_info
            if ($pathinfo === '/filter/info') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_filter_info;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\FilterController::infoAction',  '_route' => 'filter_info',);
            }
            not_filter_info:

        }

        if (0 === strpos($pathinfo, '/news')) {
            // news
            if (rtrim($pathinfo, '/') === '/news') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'news');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::indexAction',  '_route' => 'news',);
            }

            // news_show
            if (preg_match('#^/news/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::showAction',));
            }

            // news_new
            if ($pathinfo === '/news/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::newAction',  '_route' => 'news_new',);
            }

            // news_create
            if ($pathinfo === '/news/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_news_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::createAction',  '_route' => 'news_create',);
            }
            not_news_create:

            // news_edit
            if (preg_match('#^/news/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::editAction',));
            }

            // news_update
            if (preg_match('#^/news/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_news_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::updateAction',));
            }
            not_news_update:

            // news_delete
            if (preg_match('#^/news/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_news_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'news_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::deleteAction',));
            }
            not_news_delete:

            // news_info
            if ($pathinfo === '/news/info') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_news_info;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\NewsController::infoAction',  '_route' => 'news_info',);
            }
            not_news_info:

        }

        if (0 === strpos($pathinfo, '/calls')) {
            // calls
            if (rtrim($pathinfo, '/') === '/calls') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'calls');
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::indexAction',  '_route' => 'calls',);
            }

            // calls_show
            if (preg_match('#^/calls/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calls_show')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::showAction',));
            }

            // calls_new
            if ($pathinfo === '/calls/new') {
                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::newAction',  '_route' => 'calls_new',);
            }

            // calls_create
            if ($pathinfo === '/calls/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_calls_create;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::createAction',  '_route' => 'calls_create',);
            }
            not_calls_create:

            // calls_edit
            if (preg_match('#^/calls/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calls_edit')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::editAction',));
            }

            // calls_update
            if (preg_match('#^/calls/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_calls_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calls_update')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::updateAction',));
            }
            not_calls_update:

            // calls_delete
            if (preg_match('#^/calls/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_calls_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calls_delete')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::deleteAction',));
            }
            not_calls_delete:

            // calls_regions
            if ($pathinfo === '/calls/regions') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_calls_regions;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::regionsAction',  '_route' => 'calls_regions',);
            }
            not_calls_regions:

            // calls_info
            if ($pathinfo === '/calls/info') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_calls_info;
                }

                return array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::infoAction',  '_route' => 'calls_info',);
            }
            not_calls_info:

            // calls_infoid
            if (preg_match('#^/calls/(?P<id_call>[^/]++)/info$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_calls_infoid;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'calls_infoid')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\CallsController::infoidAction',));
            }
            not_calls_infoid:

        }

        // acme_mintic_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_mintic_homepage')), array (  '_controller' => 'Acme\\MinticBundle\\Controller\\DefaultController::indexAction',));
        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
