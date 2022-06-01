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
                        users.id as user_id,
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

    public function createPost($data)
    {
        // Make the query
        $this->db->query("INSERT INTO posts (user_id, title, body, post_img, post_video) VALUES(:user_id, :title, :body, :post_img, :post_video)");

        // Bind values
        $this->db->bind(":user_id", $data["user_id"]);
        $this->db->bind(":title", $data["title"]);
        $this->db->bind(":body", $data["body"]);
        $this->db->bind(":post_img", $data["post_img"]);
        $this->db->bind(":post_video", $data["post_video"]);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
