<?php namespace Controllers;

class User extends Controller
{
    public function __construct()
    {
        parent::__construct('comment');
    }

    public function index()
    {
        $comments = $this->model->find(['where' => 'user_id = ' . $this->user['id'], 'order_by' => 'date desc']);
        include_once NO_SIDEBAR_LAYOUT;
    }

    public function login()
    {
        $user = $this->auth->get_user();

        if (empty($user) && isset($_POST['username']) && isset($_POST['password'])) {
            $this->auth->login($_POST['username'], $_POST['password']);

            $logged_in = $this->auth->login($_POST['username'], $_POST['password']);

            if ($logged_in) {
                header('Location: ' . DIR_PUBLIC);
            }
        }

        include_once $this->layout;
    }

    public function logout()
    {
        $this->auth->logout();

        header('Location: ' . DIR_PUBLIC);
        exit();
    }

    public function register()
    {
        if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['password_v'])) {

            if ($_POST['password'] === $_POST['password_v']) {
                // validate
            }

            $user = [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            $this->auth->register($user);
            header('Location: ' . DIR_PUBLIC);
        }

        include_once $this->layout;
    }
}