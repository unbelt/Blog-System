<?php

class App
{
    static $page_title = 'Home';
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        if (file_exists(DIR_CONTROLLERS . $url[0] . '.php')) {
            App::$page_title = ucfirst(strtolower($url[0]));
            $this->controller = $url[0];
            unset($url[0]);
        } else {
            App::notFound();
        }

        include_once DIR_CONTROLLERS . $this->controller . '.php';
        $controller = '\Controllers\\' . $this->controller;
        $this->controller = new $controller;

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
            } else {
                App::notFound();
            }

            unset($url[1]);
        }

        if ($url) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    static function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }

        return ['0' => 'home'];
    }

    static function notFound()
    {
        App::$page_title = '404';
        include_once DIR_VIEWS . '404.php';
    }
}