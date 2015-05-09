<?php namespace Controllers;

class Admin extends Controller
{
    protected $data = [];

    public function __construct()
    {
        parent::__construct('post');

        if ($this->user['level'] !== 3) {
            header('Location: ' . DIR_PUBLIC);
        }
    }

    public function index()
    {
        $this->data = $this->model->find();
        $opened = ['date' => '', 'title' => '', 'content' => '', 'image' => '', 'tags' => '', 'category_id' => '', 'status' => ''];

        if (isset($_POST['title'], $_POST['category_id'], $_POST['tags'], $_POST['content'])) {

            $image = isset($_POST['image']) ? $_POST['image'] : 'no-image.png';

            $post = [
                'category_id' => $_POST['category_id'],
                'user_id' => $_POST['user_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $image,
                'tags' => $_POST['tags'],
                'status' => $_POST['status'],
            ];

            $result = $this->model->post($post);

            if ($result) {
                header('Location: ' . DIR_PUBLIC . 'admin');
            }
        }

        include_once NO_SIDEBAR_LAYOUT;
    }

    public function post($id = null)
    {
        $opened = $this->model->get($id)[0];

        if (isset($_POST['title'], $_POST['category_id'], $_POST['tags'], $_POST['content'])) {

            $image = isset($_POST['image']) ? $_POST['image'] : $opened['image'];

            $post = [
                'id' => $id,
                'category_id' => $_POST['category_id'],
                'user_id' => $_POST['user_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $image,
                'tags' => $_POST['tags'],
                'status' => $_POST['status'],
            ];

            $result = $this->model->update($post);

            if ($result) {
                header('Location: ' . DIR_PUBLIC . 'admin/post/' . $id);
            }
        }

        $this->view = 'admin/index';
        include_once NO_SIDEBAR_LAYOUT;
    }

    public function delete($id)
    {
        if ($id) {
            $this->model->delete(['id' => $id]);
            header('Location: ' . DIR_PUBLIC . 'admin');
        } else {
            \App::notFound();
        }
    }

    function selected($value1, $value2, $return)
    {
        if ($value1 == $value2) {
            echo $return;
        }
    }
}