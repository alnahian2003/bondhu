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
        return $this->view("pages/index", $data);
    }

    public function about()
    {
        $data = [
            "title" => "About Bondhu",
            "description" => "Bondhu is a simple social media platform to connect people around the world 🌎. This is actually a practice project. <br>
            Main objective of this project is to get handy with a MVC framework and learn how to work with it. This knowlege will help me later to work with Laravel or any other PHP framework, that follows MVC pattern.
            <a class='link-primary'
              href='https://github.com/alnahian2003/alanmvc'
              title='Alan MVC PHP Framework'
              >AlanMVC</a
            >
            is the core of this platform. AlanMVC is a micro MVC PHP framework.
            Both 'Bondhu' & 'AlanMVC' is made with ❤ by
            <a href='https://alnahian2003.github.io'>alnahian2003</a>",
        ];
        $this->view("pages/about", $data);
    }
}
