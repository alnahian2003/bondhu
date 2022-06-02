<?php
class UserProfile extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get Logged In User Informations by Id to Show them on Profile Page
    public function getUserProfile($userId)
    {
        $this->db->query("SELECT id, name, username, profile_img, bio, created_at FROM users WHERE id = :user_id");
        $this->db->bind(":user_id", $userId);

        // Execute
        if ($this->db->execute()) {
            return $this->db->single();
        } else {
            die("Something is wrong");
        }
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
}