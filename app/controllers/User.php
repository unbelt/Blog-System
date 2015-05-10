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

    public function register($register = true)
    {
        if (isset($_POST['email'])) {

            if ($register) {
                if ($_POST['password'] === $_POST['password_v'] && isset($_POST['username'], $_POST['password'], $_POST['password_v'])) {
                    $user = [
                        'first_name' => $_POST['first_name'],
                        'last_name' => $_POST['last_name'],
                        'username' => $_POST['username'],
                        'email' => $_POST['email'],
                        'password' => $_POST['password']
                    ];

                    $this->auth->register($user);
                    header('Location: ' . DIR_PUBLIC);
                }
            } else {
                $password = isset($_POST['password'], $_POST['password_v']) && $_POST['password'] == $_POST['password_v'] ? $_POST['password'] : '';

                $user = [
                    'id' => $this->user['id'],
                    'username' => $this->user['username'],
                    'avatar' => $this->user['avatar'],
                    'date_reg' => $this->user['date_reg'],
                    'level' => $this->user['level'],
                    'first_name' => $_POST['first_name'] ?: '',
                    'last_name' => $_POST['last_name'] ?: '',
                    'password' => $password,
                    'email' => $_POST['email']
                ];

                $result = $this->auth->edit($user);

                if($result) {
                    $_SESSION['user'] = $user;
                    header('Location: ' . DIR_PUBLIC . 'user/edit/' . $this->user['id']);
                    exit();
                }
            }
        }

        include_once $this->layout;
    }

    public function edit()
    {
        if (!$this->is_logged) {
            header('Location: ' . DIR_PUBLIC);
        }

        if (isset($_POST['edit'])) {
            $this->register(false);
        }

        include_once $this->layout;
    }
}