<?php
class Post extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPosts()
    {
        $this->db->query("SELECT *,
                        posts.id as postId,
                        users.id as userId
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.posted_at DESC
                        ");
        $posts = $this->db->resultSet();

        return $posts;
    }
}
