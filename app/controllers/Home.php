<?php namespace Controllers;

class Home extends Controller
{
    public function __construct()
    {
        parent::__construct('post');
    }

    public function index()
    {
        $data = $this->model->find(['limit' => 1]);
        $view = $this->view;
        include_once $this->template;
    }
}