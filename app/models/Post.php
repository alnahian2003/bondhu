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
                        posts.id as post_id,
                        users.id as users_id,
                        posts.posted_at as post_time,
                        users.created_at as user_created
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.posted_at DESC
                        ");
        $posts = $this->db->resultSet();

        return $posts;
    }
}
