<?php namespace Controllers;

class Home extends Controller
{
    public function __construct()
    {
        parent::__construct('post');
    }

    public function index()
    {
        $posts = $this->model->find(['where' => 'status = 1', 'order_by' => 'date desc', 'limit' => 3]);

        include_once $this->layout;
    }
}