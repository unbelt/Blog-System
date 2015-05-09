<?php namespace Models;


class Tags extends Model
{
    public function __construct()
    {
        parent::__construct(['table' => 'tags']);
    }
}