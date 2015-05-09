<?php namespace Controllers;

class Admin extends Controller
{
    public function __construct()
    {
        parent::__construct('post');

    }

    public function index()
    {
        $data = $this->model->find();
        $opened = ['date' => '','title' => '', 'content' => '', 'image' => '', 'tags' => ''];

        include_once NO_SIDEBAR_LAYOUT;
    }

    public function post($id = null)
    {
        $post = $this->model->find($id);

        $this->view = 'admin/index';
        include_once NO_SIDEBAR_LAYOUT;
    }
}