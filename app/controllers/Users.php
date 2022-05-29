<?php
class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    public function signup()
    {
        // Check for POST request
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the form

            // Init data
            $data = [
                "name" => htmlspecialchars(trim($_POST["name"])),
                "email" => htmlspecialchars(trim($_POST["email"])),
                "password" => htmlspecialchars(trim($_POST["password"])),
                "confirmPassword" => htmlspecialchars(trim($_POST["confirmPassword"])),

                // Error variables
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirmPassword_error" => "",
            ];

            // Validate Name
            if (empty($data["name"])) {
                $data["name_error"] = "Please enter your name.";
            }

            // Validate Email
            if (empty($data["email"])) {
                $data["email_error"] = "Please enter your email.";
            } else {
                if ($this->userModel->findUserByEmail($data["email"])) {
                    $data["email_error"] = "Email already taken.";
                }
            }

            // Validate Password
            if (empty($data["password"])) {
                $data["password_error"] = "Please enter a password.";
            } elseif (strlen($data["password"]) < 6) {
                $data["password_error"] = "Password must be at least 6 characters.";
            }

            // Validate Confirm Password
            if (empty($data["confirmPassword"])) {
                $data["confirmPassword_error"] = "Please enter your password.";
            } elseif ($data["confirmPassword"] != $data["password"]) {
                $data["confirmPassword_error"] = "Passwords should match.";
            }

            // Make sure, errors are empty
            if (empty($data["name_error"]) && empty($data["email_error"]) && empty($data["password_error"]) && empty($data["confirmPassword_error"])) {
                // User Inputs Validated ✅

                // Hash the password
                $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);

                // Register the User Finally
                if ($this->userModel->register($data)) {
                    // Show Flash Message
                    flash("signup_success", "You are registerd. Please Log In!");
                    // Redirect to homepage
                    redirct("users/login");
                } else {
                    die("Something Went Wrong, can't register");
                }
            } else {
                // Load view with errors
                return $this->view("users/signup", $data);
            }
        } else {
            // Init data
            $data = [
                "name" => "",
                "email" => "",
                "password" => "",
                "confirmPassword" => "",

                // Error variables
                "name_error" => "",
                "email_error" => "",
                "password_error" => "",
                "confirmPassword_error" => "",
            ];

            // load view and pass the data
            return $this->view("users/signup", $data);
        }
    }

    public function login()
    {
        // Check for POST request
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the form
            // Init data
            $data = [
                "email" => htmlspecialchars(trim($_POST["email"])),
                "password" => htmlspecialchars(trim($_POST["password"])),

                // Error variables
                "email_error" => "",
                "password_error" => ""
            ];

            // Validate Email
            if (empty($data["email"])) {
                $data["email_error"] = "Please enter your email!";
            }

            // Validate Password
            if (empty($data["password"])) {
                $data["password_error"] = "Please enter a password!";
            } elseif (strlen($data["password"]) < 6) {
                $data["password_error"] = "Password must be at least 6 characters!";
            }

            // Make sure, errors are empty
            if (empty($data["email_error"]) && empty($data["password_error"])) {
                die("Logged In Successfully");
            } else {
                // Load view with errors
                return $this->view("users/login", $data);
            }
        } else {
            //    Init data
            $data = [
                "email" => "",
                "password" => "",

                // Error variables
                "email_error" => "",
                "password_error" => ""
            ];

            // load view and pass the data
            return $this->view("users/login", $data);
        }
    }
}
