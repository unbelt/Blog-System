<?php namespace Controllers;

class Home extends Controller
{
    public function index($params = null)
    {
        $this->view();
    }

    public function error()
    {
        $this->view();
    }
}