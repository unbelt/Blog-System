<?php namespace Controllers;

class Controller
{
    static $view;
    protected $template;
    protected $model;

    public function __construct($model = 'pages', $view = null, $layout = FILE_LAYOUT)
    {
        $class = new \ReflectionClass(get_class($this));
        $class_name = $class->getShortName();

        // Load model
        include_once DIR_MODELS . ucfirst(strtolower($model)) . '.php';
        $model_class = '\\Models\\' . $model;
        $this->model = new $model_class(['table' => 'none']);

        // Load view
        $view = $view ? $view : strtolower($class_name . '/' . \App::$method);
        Controller::$view = DIR_VIEWS . $view;

        // Load template
        $this->template = $layout;
        include_once $this->template;
    }
}