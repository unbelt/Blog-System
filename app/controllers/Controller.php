<?php namespace Controllers;

class Controller
{
    static $view;
    protected $template;
    protected $model;

    protected function model($model)
    {
        require_once DIR_MODELS . $model . '.php';
        $model = '\\Models\\' . $model;

        return new $model();
    }

    protected function view($data = [], $view = null, $layout = FILE_LAYOUT)
    {
        if (!isset($view)) {
            $class = new \ReflectionClass(get_class($this));

            Controller::$view = strtolower(DIR_VIEWS . $class->getShortName()) . '/' . \App::$method;
        } else {
            Controller::$view = $view;
        }

        $this->template = $layout;

        /*$model = DIR_MODELS . get_class($this);
        $this->model = new $model(['table' => 'none']);*/

        include_once $this->template;
    }
}