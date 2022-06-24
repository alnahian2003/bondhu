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

    // Find User By username
    public function findByUsername($username)
    {
        // Make query
        $this->db->query("SELECT * FROM users WHERE username = :username");

        // Bind value
        $this->db->bind(":username", $username);

        // Find the single row
        $row = $this->db->single();

        // Check row
        if ($this->db->RowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadProfileImg($id, $fileWithPath)
    {
        $this->db->query("UPDATE users SET profile_img = :filepath WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":filepath", $fileWithPath);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadCoverImg($id, $fileWithPath)
    {
        $this->db->query("UPDATE users SET cover_img = :filepath WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->bind(":filepath", $fileWithPath);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editProfile($userId, $username, $email, $bio, $workplace, $location, $birthdate, $relationship)
    {
        $this->db->query("UPDATE users SET username = :username, email = :email, bio = :bio, company_name = :workplace, location = :location, birthdate = :birthdate, relationship = :relationship  WHERE id = :id");
        $this->db->bind(":id", $userId);
        $this->db->bind(":username", $username);
        $this->db->bind(":email", $email);
        $this->db->bind(":bio", $bio);
        $this->db->bind(":workplace", $workplace);
        $this->db->bind(":location", $location);
        $this->db->bind(":birthdate", $birthdate);
        $this->db->bind(":relationship", $relationship);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Delete an User from Settings Page
    public function delete($userId)
    {
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(":id", $userId);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
