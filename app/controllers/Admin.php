<?php namespace Controllers;

use Config\Storage;
use Models\Category;

class Admin extends Controller
{
    protected $data = [];
    protected $storage;

    public function __construct()
    {
        parent::__construct('post');

        if (!$this->is_admin) {
            header('Location: ' . DIR_PUBLIC);
        }

        include_once DIR_CONFIG . 'Storage.php';
        $this->storage = new Storage();
    }

    public function index()
    {
        $this->data = $this->model->find(['order_by' => 'date desc']);
        $opened = ['date' => '', 'title' => '', 'content' => '', 'image' => '', 'tags' => '', 'category_id' => '', 'status' => ''];

        if (isset($_POST['title'], $_POST['category_id'], $_POST['tags'], $_POST['content'])) {
            $image = isset($_POST['file']) ? $_POST['file'] : 'no-image.png';
            $this->storage->uploadImg();

            $post = [
                'category_id' => $_POST['category_id'],
                'user_id' => $_POST['user_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $image,
                'tags' => $_POST['tags'],
                'status' => $_POST['status']
            ];

            $result = $this->model->post($post);

            if ($result) {
                header('Location: ' . DIR_PUBLIC . 'admin');
            }
        }

        if (isset($_POST['category'])) {
            include_once DIR_MODELS . 'Category.php';
            $category_class = new Category();
            $result = $category_class->post($_POST['category']);

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
            $image = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : $opened['image'];
            $this->storage->uploadImg();

            $post = [
                'id' => $id,
                'category_id' => $_POST['category_id'],
                'user_id' => $_POST['user_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'image' => $image,
                'tags' => $_POST['tags'],
                'status' => $_POST['status']
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