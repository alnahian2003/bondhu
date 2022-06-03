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
        $this->db->query("SELECT name, profile_img, user_id, title, body, post_img, post_video, posted_at,
                        posts.id as post_id,
                        users.id as user_id,
                        posts.posted_at as post_time
                        FROM posts
                        INNER JOIN users
                        ON posts.user_id = users.id
                        ORDER BY posts.posted_at DESC
                        ");
        $posts = $this->db->resultSet();

        return $posts;
    }

    // Get Logged In User Informations by Id to Show them on Profile Card
    public function getUserById($userId)
    {
        $this->db->query("SELECT id, name, username, profile_img, bio, created_at FROM users WHERE id = :user_id");
        $this->db->bind(":user_id", $userId);

        // Execute
        if ($this->db->execute()) {
            return $this->db->single();
        } else {
            return die("Something is wrong");
        }
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

    public function getPostById($postId)
    {
        $this->db->query("SELECT * FROM posts WHERE id = :id");
        $this->db->bind(":id", $postId);

        // Execute
        if ($this->db->execute()) {
            return $this->db->single();
        } else {
            return die("Something is wrong");
        }
    }

    public function getPostUserById($userId)
    {
        $this->db->query("SELECT id, name, profile_img FROM users WHERE id = :id");
        $this->db->bind(":id", $userId);

        // Execute
        if ($this->db->execute()) {
            return $this->db->single();
        } else {
            return die("Something is wrong");
        }
    }

    public function editPost($data)
    {
        // Make the query
        $this->db->query("UPDATE posts SET title = :title, body = :body, post_img = :post_img, post_video = :post_video WHERE id = :id");

        // Bind values
        $this->db->bind(":id", $data["postId"]);
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

    public function deletePost($postId)
    {
        $this->db->query("DELETE FROM posts WHERE id = :id");
        $this->db->bind(":id", $postId);

        // Execute
        if ($this->db->execute()) {
            return $this->db->execute();
        } else {
            return false;
        }
    }
}
