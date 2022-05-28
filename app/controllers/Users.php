<?php
class Users extends Controller
{
    public function __construct()
    {
    }

    public function signup()
    {
        // Check for POST request
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process the form
        } else {
            //    Init data
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
