<?php namespace Controllers;

class Home extends Controller
{
    public function __construct()
    {
        parent::__construct('post');
    }

    public function index()
    {
        var_dump($this->model->find());
    }

    public function error()
    {
    }
}