<?php

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            "title" => "Welcome to Bondhu",
            "subtitle" => "Where friends get connected",
        ];
        $this->view("pages/index", $data);
    }
}
