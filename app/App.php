<?php

class App
{
    static $method = 'index';
    static $page_title = 'Home';
    protected $controller = 'home';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (isset($url[0]) && file_exists(DIR_CONTROLLERS . $url[0] . '.php')) {

            $this->controller = $url[0];
            unset($url[0]);

            require_once DIR_CONTROLLERS . $this->controller . '.php';

            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    App::$method = $url[1];
                    unset($url[1]);
                } else {
                    $this->controller = 'home';
                    App::$method = 'error';

                    require_once DIR_CONTROLLERS . $this->controller . '.php';
                }
            }
        } else {
            if (isset($url[0])) {
                App::$method = 'error';
            }

            require_once DIR_CONTROLLERS . $this->controller . '.php';
        }

        if ($url) {
            $this->params = array_values($url);
        }

        App::$page_title = ucfirst($this->controller);

        $controller = '\\Controllers\\' . $this->controller;
        $this->controller = new $controller;
        call_user_func_array([$this->controller, App::$method], $this->params);
    }

    protected function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}