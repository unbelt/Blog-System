<?php namespace Controllers;

class Contact extends Controller
{
    public function __construct()
    {
        parent::__construct('model');
    }

    public function index()
    {
        include_once $this->layout;
    }
}