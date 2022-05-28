<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "Welcome to AlanMVC",
            "subtitle" => "Your Personal Micro MVC Framework!",
        ];
        $this->view("pages/index", $data);
    }
}
