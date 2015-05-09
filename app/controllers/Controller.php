<?php namespace Controllers;

use Config\Auth;

class Controller
{
    protected $model = 'Model';

    public $user;
    public $is_logged = false;
    public $is_admin = false;
    public $auth;

    public $categories;
    public $comments;
    public $tags = [];

    protected $view;
    protected $layout;

    public function __construct($model = null, $view = null, $layout = DEFAULT_LAYOUT)
    {
        $this->layout = $layout;

        // Load view
        if ($view) {
            $this->view = $view;
        } else {
            $url = \App::parseUrl();
            $class = new \ReflectionClass(get_class($this));
            $this->view = $class->getShortName() . '/' . (isset($url[1]) ? $url[1] : 'index');

            if (isset($url[1]) && !file_exists(DIR_VIEWS . $this->view . '.php')) {
                $this->view = 'home/index';
            }
        }

        // Load auth
        $this->auth = Auth::get_instance();
        $this->user = $this->auth->get_user();
        $this->is_logged = $this->auth->is_logged();
        $this->is_admin = $this->auth->is_admin();

        // Load model
        if ($model) {
            $this->model = $model;
        }

        include_once DIR_MODELS . ucfirst(strtolower($this->model)) . '.php';
        $model_class = '\Models\\' . $this->model;
        $this->model = new $model_class(['table' => 'none']);

        $this->categories = $this->model->find(['table' => 'categories']);
        $this->comments = $this->model->find(['table' => 'comments', 'order_by' => 'date desc', 'limit' => 5]);
        $tags = $this->model->find(['table' => 'posts', 'columns' => 'tags', 'where' => 'status = 1', 'limit' => 20]);

        foreach ($tags as $value) {
            array_push($this->tags, explode(',', $value['tags']));
        }

        $this->tags = $this->array_flatten($this->tags, 0);
    }

    function array_flatten($array, $preserve_keys = 1, &$newArray = Array()) {
        foreach ($array as $key => $child) {
            if (is_array($child)) {
                $newArray =& $this->array_flatten($child, $preserve_keys, $newArray);
            } elseif ($preserve_keys + is_string($key) > 1) {
                $newArray[$key] = $child;
            } else {
                $newArray[] = $child;
            }
        }

        return array_filter($newArray);
    }
}