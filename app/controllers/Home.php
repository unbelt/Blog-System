<?php namespace Controllers;

class Home extends Controller
{
    public function __construct()
    {
        parent::__construct('post');
    }

    public function index()
    {
        $posts = $this->model->find(['limit' => 5]);

        include_once $this->layout;
    }
}