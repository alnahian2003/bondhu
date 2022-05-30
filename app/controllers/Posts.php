<?php
class Posts extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION["user_id"])) {
            redirect("users/login");
        }
    }

    public function index()
    {
        $data = [];
        return $this->view("posts/index", $data);
    }
}
