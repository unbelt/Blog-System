<?php namespace Models;

class User extends Model
{
    protected $username;
    protected $email;
    protected $password;

    public function __construct()
    {
        parent::__construct(['table' => 'users']);
    }
}