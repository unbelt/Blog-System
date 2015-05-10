<?php namespace Models;

class Category extends Model
{
    public function __construct()
    {
        parent::__construct(['table' => 'categories']);
    }

    public function post($category)
    {
        $statement = $this->db->prepare("INSERT INTO categories (name) VALUES (?)");
        $statement->bind_param('s', $category);

        return $statement->execute();
    }
}