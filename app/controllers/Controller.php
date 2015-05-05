<?php namespace Controllers;

class Controller
{
    protected $template;
    protected $view;
    protected $model;

    public function __construct($model = null, $view = null, $layout = FILE_LAYOUT)
    {
        if (!$view) {
            $class = new \ReflectionClass(get_class($this));
            $class_name = $class->getShortName();
            $view = $class_name;
        }

        // Load view
        $this->template = $layout;
        $this->view = DIR_VIEWS . $view . '/index';

        if (!$model) {
            $view =  $this->view;
            include_once $this->template;
        } else {
            include_once DIR_MODELS . ucfirst(strtolower($model)) . '.php';
            $model_class = '\\Models\\' . $model;
            $this->model = new $model_class(['table' => 'none']);
        }
    }
}