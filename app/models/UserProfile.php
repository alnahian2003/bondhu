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
    public function delete($userId, $userEmail)
    {
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(":id", $userId);

        // Execute
        if ($this->db->execute()) {
            // Delete all the posts by this user
            $this->db->query("DELETE FROM posts WHERE user_id = :id");
            $this->db->bind(":id", $userId);
            $this->db->execute();

            // Don't only delete the user, delete all the associative uploaded files by this user
            // Format user email address for the user's very own directory
            $email = $userEmail;
            $email = explode("@", $email);
            $nameFromEmail = $email[0];
            $baseDir = "img/users/" . $nameFromEmail;

            /* Use RecursiveDirectoryIterator because rmdir() just don't delete
                a directory, which has some file in it.
            */
            $iterate = new RecursiveDirectoryIterator($baseDir, RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator(
                $iterate,
                RecursiveIteratorIterator::CHILD_FIRST
            );
            foreach ($files as $file) {
                if ($file->isDir()) {
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($baseDir);

            flash("user_deleted", "Account Deleted Successfully!"); // show this on homepage

            unset($_SESSION["user_id"]);
            unset($_SESSION["name"]);
            unset($_SESSION["email"]);

            redirect("pages/index");

            return true;
        } else {
            return false;
        }
    }
}
