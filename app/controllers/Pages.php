<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    // Home Page
    public function index()
    {
        $data = [
            "title" => "Welcome to Bondhu",
            "subtitle" => "Where friends get connected",
        ];
        return $this->view("pages/index", $data);
    }

    // Features Page
    public function features()
    {
        return $this->view("pages/features");
    }


    // About Page
    public function about()
    {
        $data = [
            "title" => "About Bondhu",
        ];
        $this->view("pages/about", $data);
    }
}
