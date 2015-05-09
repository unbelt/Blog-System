<?php namespace Controllers;

class Post extends Controller
{
    public function __construct()
    {
        parent::__construct('post');
    }

    public function view($id = '')
    {
        $post = $this->model->get($id)[0];

        if (empty($post)) {
            $this->view = '404';
            \App::notFound();
        } else {
            $comments = $this->model->find(['table' => 'comments', 'where' => 'post_id = ' . $post['id']]);
            $tags = $this->model->find(['table' => 'tags', 'where' => 'post_id = ' . $post['id']]);
        }

        $this->view = 'post/index';
        include_once $this->layout;
    }

    public function category($id)
    {
        $posts = $this->model->find(['table' => 'posts as p INNER JOIN categories as c ON p.category_id = c.id AND c.id = ' . $id]);

        if (empty($posts)) {
            $this->view = '404';
            \App::notFound();
        }

        $this->view = 'home/index';
        include_once $this->layout;
    }

    public function tag($tag)
    {
        $posts = $this->model->find(["table" => "posts as p INNER JOIN tags as t ON p.id = t.post_id AND t.value like '%{$tag}%'"]);

        $this->view = 'home/index';
        include_once $this->layout;
    }

    public function create($post)
    {
        include_once NO_SIDEBAR_LAYOUT;
    }

    public function edit($id)
    {
        $this->view = 'post/create';
        include_once NO_SIDEBAR_LAYOUT;
    }

    public function delete($id)
    {
    }
}