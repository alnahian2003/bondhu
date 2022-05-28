<?php
class User extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    // Find User By Email Address
    public function findUserByEmail($email)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(":email", $email);

        // Find the single row
        $row = $this->db->single();

        // Check row
        if ($this->db->RowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
