<?php namespace Controllers;

class Posts extends Controller
{
    public function __construct()
    {
        parent::__construct('post', 'home');
    }

    public function index()
    {
        $data = $this->model->find();
        $view = $this->view;
        include_once $this->template;
    }

    public function view($id)
    {
        $data = $this->model->get($id);
        $view = $this->view;
        include_once $this->template;
    }
}