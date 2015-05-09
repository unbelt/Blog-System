<?php namespace Models;

class Post extends Model
{
    public function __construct()
    {
        parent::__construct(['table' => 'posts']);
    }

    public function post($post = [])
    {
        $statement = $this->db->prepare("INSERT INTO posts (category_id, user_id, title, content, image, tags, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->bind_param('iissssi', $post['category_id'], $post['user_id'], $post['title'], $post['content'], $post['image'], $post['tags'], $post['status']);

        return $statement->execute();
    }

    public function update($post)
    {
        $q = $statement = $this->db->prepare("UPDATE posts SET category_id=?, user_id=?, title=?, content=?, image=?, tags=?, status=? WHERE id=?");
        var_dump($q);

        $statement->bind_param('iissssii', $post['category_id'], $post['user_id'], $post['title'], $post['content'], $post['image'], $post['tags'], $post['status'], $post['id']);

        return $statement->execute();
    }
}