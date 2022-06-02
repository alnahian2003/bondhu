<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    // Home Page
    public function index()
    {

        if (isLoggedIn()) {
            redirect("posts");
        }

        $data = [
            "title" => "Welcome to Bondhu",
            "subtitle" => "Where friends get connected",
        ];
        return $this->view("pages/index", $data);
    }

    // Features Page
    public function features()
    {
        if (isLoggedIn()) {
            redirect("posts");
        } else {
            return $this->view("pages/features");
        }
    }


    // About Page
    public function about()
    {
        if (isLoggedIn()) {
            redirect("posts");
        } else {
            $data = [
                "title" => "About Bondhu",
            ];
            $this->view("pages/about", $data);
        }
    }
}
