<?php

namespace Lib;

class Router
{
    // Variables
    private $app;
    private $controllersNamespaces;

    /**
     * Constructeur
     *
     * @param $app
     * @param $controllersNamespaces
     */
    public function __construct($app, $controllersNamespaces)
    {
        $this->app                   = $app;
        $this->controllersNamespaces = $controllersNamespaces;
    }

    /**
     * Appel méthode
     *
     * @param $method
     * @param $url
     * @param $action
     * @return
     */
    private function call($method, $url, $action)
    {
        return $this->app->$method($url, function() use ($action) {
            $action = explode('@', $action);

            if (count($action) == 1)
            {

                // Controller
                $controllerName = $this->controllersNamespaces . ($action[0] == '' ?
                        'DefaultController' : ucfirst($action[0]) . 'Controller');
                $methodName     = 'indexAction';
            }
            elseif (count($action) == 2)
            {
                // Controller
                $controllerName = $this->controllersNamespaces . ($action[0] == '' ?
                        'DefaultController' : ucfirst($action[0]) . 'Controller');

                // Action
                $methodName = $action[1] == '' ? 'indexAction' : $action[1] . 'Action';
            }

            $controller = new $controllerName($this->app);

            call_user_func_array(array($controller, $methodName),
                                 func_get_args());
        });
    }

    /**
     * Méthode GET
     *
     * @param $url
     * @param $action
     *
     * @return
     */
    public function get($url, $action)
    {
        return $this->call('get', $url, $action);
    }

    /**
     * Méthode POST
     *
     * @param $url
     * @param $action
     *
     * @return
     */
    public function post($url, $action)
    {
        return $this->call('post', $url, $action);
    }

    /**
     * Génération des routes
     *
     * @param $routes
     */
    public function generateRoutes($routes)
    {
        if (is_array($routes))
        {
            foreach ($routes as $groupName => $routesList)
            {
                if (!isset($routesList['url']) || !isset($routesList['method']) || !isset($routesList['action']))
                {
                    $this->app->group('/' . $groupName, function() use ($routesList) {
                        $this->generateRoutes($routesList);
                    });
                }
                else
                {
                    if (isset($routesList['conditions']) && count($routesList['method']) > 0)
                        $this->call($routesList['method'], $routesList['url'], $routesList['action'])
                            ->name($groupName)
                            ->conditions($routesList['conditions']);
                    else
                        $this->call($routesList['method'], $routesList['url'], $routesList['action'])
                            ->name($groupName);
                }
            }
        }
    }
}