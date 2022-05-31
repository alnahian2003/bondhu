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
                    redirect("users/login");
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
                "userInput" => htmlspecialchars(trim($_POST["userInput"])),
                "password" => htmlspecialchars(trim($_POST["password"])),

                // Error variables
                "userInput_error" => "",
                "password_error" => ""
            ];

            // Validate Email
            if (empty($data["userInput"])) {
                $data["userInput_error"] = "Please enter email or username!";
            }

            // Validate Password
            if (empty($data["password"])) {
                $data["password_error"] = "Please enter a password!";
            } elseif (strlen($data["password"]) < 6) {
                $data["password_error"] = "Password must be at least 6 characters!";
            }

            // Check for User Email Or Username in DB
            if ($this->userModel->findUserByEmail($data["userInput"])) {
                // User found
            } else {
                // User not found, display error
                $data["userInput_error"] = "Sorry, No User Found!";
            }

            // Make sure, errors are empty
            if (empty($data["userInput_error"]) && empty($data["password_error"])) {
                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data["userInput"], $data["password"]);
                if ($loggedInUser) {

                    // Cerate Session
                    $this->createUserSession($loggedInUser);
                } else {

                    $data["password_error"] = "Incorrect Password.";
                    return $this->view("users/login", $data);
                }
            } else {

                // Load view with errors
                return $this->view("users/login", $data);
            }
        } else {

            //    Init data
            $data = [
                "userInput" => "",
                "password" => "",

                // Error variables
                "userInput_error" => "",
                "password_error" => ""
            ];


            // load view and pass the data
            return $this->view("users/login", $data);
        }
    }

    public function createUserSession($loggedUser)
    {
        $_SESSION["user_id"] = $loggedUser->id;
        $_SESSION["name"] = $loggedUser->name;
        $_SESSION["email"] = $loggedUser->email;

        redirect("posts");
    }

    public function logout()
    {
        unset($_SESSION["user_id"]);
        unset($_SESSION["name"]);
        unset($_SESSION["email"]);

        session_destroy();

        redirect("pages/index");
    }
}


/* 
TODO:
Change Sign Up Form to Sign In, in the home page to make it simple
*/