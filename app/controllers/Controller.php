<?php

class Controller
{
    protected function model($model)
    {
        require_once DIR_MODELS . $model . '.php';

        return new $model();
    }

    protected function view($view = 'home/index', $data = [])
    {
        $template = $view;

        include_once FILE_LAYOUT;
    }
}