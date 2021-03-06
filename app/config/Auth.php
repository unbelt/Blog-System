<?php namespace Config;

use Models\Model;

class Auth
{
    private static $session;

    private function __construct()
    {
        // Session lifetime = 60 min
        session_set_cookie_params(3600, '/');
        session_start();
    }

    public static function get_instance()
    {
        static $instance = null;

        if (!$instance) {
            $instance = new static();
        }

        return $instance;
    }

    public function register($user = [])
    {
        $instance = Database::get_instance();
        $db = $instance->get_db();

        $statement = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $statement->bind_param('sss', $user['username'], $user['email'], MD5($user['password']));

        if ($statement->execute()) {
            $this->login($user['username'], $user['password']);

            return true;
        }

        return false;
    }

    public function edit($user = [])
    {
        $instance = Database::get_instance();
        $db = $instance->get_db();

        if (isset($user['password'])) {
            $statement = $db->prepare("UPDATE users SET first_name=?, last_name=?, password=MD5(?), email=? WHERE id=?");
            $statement->bind_param('ssssi', $user['first_name'], $user['last_name'], $user['password'], $user['email'], $user['id']);
        } else {
            $statement = $db->prepare("UPDATE users SET first_name=?, last_name=?, email=? WHERE id=?");
            $statement->bind_param('ssssi', $user['first_name'], $user['last_name'], $user['email'], $user['id']);
        }

        return $statement->execute();
    }

    public function is_logged()
    {
        return isset($_SESSION['user']) ? true : false;
    }

    public function is_admin()
    {
        if ($this->is_logged()) {
            if ($_SESSION['user']['level'] === 3) {
                return true;
            }
        }

        return false;
    }

    public function login($username, $password)
    {
        $instance = Database::get_instance();
        $db = $instance->get_db();

        $statement = $db->prepare("SELECT * FROM users WHERE username = ? AND password = MD5( ? ) LIMIT 1");
        $statement->bind_param('ss', $username, $password);

        $statement->execute();

        $result = $statement->get_result();

        if ($row = $result->fetch_assoc()) {
            $_SESSION['user'] = $row;

            return true;
        }

        return false;
    }

    public function logout()
    {
        session_destroy();
    }

    public function get_user($id = null)
    {
        if ($id) {
            $user_model = new Model(['table' => 'users']);
            $user = $user_model->get($id);

            if ($user) {
                return $user[0];
            }
        }
        if ($this->is_logged()) {
            return $_SESSION['user'];
        }
    }
}