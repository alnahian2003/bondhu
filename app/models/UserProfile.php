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
        $this->db->query("SELECT id, name, email, username, profile_img, cover_img, bio, company_name, location, birthdate, relationship, is_verified, created_at FROM users WHERE id = :user_id");
        $this->db->bind(":user_id", $userId);

        // Execute
        if ($this->db->execute()) {
            return $this->db->single();
        } else {
            die("Something is wrong");
        }
    }

    public function getPostsByUser($userId)
    {
        $this->db->query("SELECT * from posts WHERE user_id = :id ORDER BY posted_at DESC");
        $this->db->bind("id", $userId);
        // Execute
        if ($this->db->execute()) {
            return $posts = $this->db->resultSet();
        } else {
            die("Something is wrong");
        }
    }
}
