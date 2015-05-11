<?php namespace Controllers;

use Models\Comment;

class Post extends Controller
{
    public function __construct()
    {
        parent::__construct('post');
    }

    public function index()
    {
        header('Location: ' . DIR_PUBLIC);
    }

    public function view($id = '')
    {
        $post = $this->model->get($id)[0];
        if ($post['status'] != 1) {
            header('Location: ' . DIR_PUBLIC);
        }

        if(!isset($_SESSION[$id]['views'])) {
            $_SESSION[$id]['views'] = 0;
        }
        $_SESSION[$id]['views']++;

        $post['views'] =  $_SESSION[$id]['views'];
        $this->model->update($post);

        if (empty($post)) {
            $this->view = '404';
            \App::notFound();
        } else {
            $this->view = 'post/index';
            $comments = $this->model->find(['table' => 'comments', 'where' => 'post_id = ' . $post['id']]);
        }

        if (isset($_POST['post_id'], $_POST['user_email'], $_POST['comment'])) {

            $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : null;

            $comment = [
                'post_id' => $_POST['post_id'],
                'user_id' => $user_id,
                'user_email' => $_POST['user_email'],
                'comment' => $_POST['comment']
            ];

            include_once DIR_MODELS . 'Comment.php';
            $comment_class = new Comment();
            $result = $comment_class->post($comment);

            var_dump($result);
        }

        include_once $this->layout;
    }

    public function category($id)
    {
        $posts = $this->model->find(['where' => 'status = 1 AND category_id = ' . $id]);

        if (empty($posts)) {
            \App::notFound();
        }

        $this->view = 'home/index';
        include_once $this->layout;
    }

    public function tag($tag)
    {
        $posts = $this->model->find(["where" => "`tags` like '%{$tag}%'"]);

        $this->view = 'home/index';
        include_once $this->layout;
    }
}