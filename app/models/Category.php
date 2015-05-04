<?php namespace Models;


class Category extends Model
{
    public function __construct()
    {
        parent::__construct(['table' => 'categories']);
    }
}