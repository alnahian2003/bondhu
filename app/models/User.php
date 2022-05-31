<?php
class User extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Find User By Email Address
    public function findUserByEmail($userInput)
    {
        // Make query
        $this->db->query("SELECT * FROM users WHERE email = :email OR username = :username");

        // Bind value
        $this->db->bind(":email", $userInput);
        $this->db->bind(":username", $userInput);

        // Find the single row
        $row = $this->db->single();

        // Check row
        if ($this->db->RowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Register an User
    public function register($data)
    {
        // Make the query
        $this->db->query("INSERT INTO users (name, email, password) VALUES(:name, :email, :password)");

        // Bind values
        $this->db->bind(":name", $data["name"]);
        $this->db->bind(":email", $data["email"]);
        $this->db->bind(":password", $data["password"]);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login an User
    public function login($userInput, $password)
    {
        $this->db->query("SELECT * FROM users WHERE email = :email OR username = :username");
        $this->db->bind(":email", $userInput);
        $this->db->bind(":username", $userInput);
        // get the single row
        $row = $this->db->single();

        // Get hashed password from db
        $hashed_password = $row->password;

        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}
