<?php

class Home extends Controller
{
    public function index($params = null)
    {
        $user = $this->model('User');
        $user->name = $params;

        $this->view('home/index', ['name' => $user->name]);
    }

    public function error() {
        $this->view('error/index');
    }
}