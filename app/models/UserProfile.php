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
}
