<?php namespace Controllers;

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct('user');
    }

    public function index()
    {
        $view = $this->view;
        include_once $this->template;
    }
}