<?php namespace Models;


class Comment extends Model
{
    public function __construct()
    {
        parent::__construct(['table' => 'comments']);
    }
}