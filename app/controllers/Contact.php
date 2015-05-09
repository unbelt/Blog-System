<?php namespace Controllers;

class Contact extends Controller
{
    public function __construct()
    {
        parent::__construct('model');
    }

    public function index()
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $headers = 'From: ' . "$email\r\n" .
                'Reply-To: ' . "$email\r\n" .
                'X-Mailer: PHP/' . \phpversion();

            \mail('klaxon@abv.bg', $subject, $message . "\r\n$name", $headers);
        }

        include_once $this->layout;
    }
}