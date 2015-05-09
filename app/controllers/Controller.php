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
    public $tags;

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
        $this->comments = $this->model->find(['table' => 'comments', 'limit' => 5]);
        $this->tags = $this->model->find(['table' => 'tags', 'limit' => 20]);
    }
}