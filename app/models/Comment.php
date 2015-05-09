<?php namespace Models;

class Comment extends Model
{
    public function __construct()
    {
        parent::__construct(['table' => 'comments']);
    }

    public function post($comment = [])
    {
        $statement = $this->db->prepare("INSERT INTO comments (post_id, user_id, user_email, content) VALUES (?, ?, ?, ?)");
        $statement->bind_param('iiss', $comment['post_id'], $comment['user_id'], $comment['user_email'], $comment['content']);

        return $statement->execute();
    }
}