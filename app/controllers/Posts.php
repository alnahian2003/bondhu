<?php
class Posts extends Controller
{
    public function __construct()
    {
        // Won't let user see the posts page if they're not logged in
        if (!isLoggedIn()) {
            redirect("users/login");
        }
    }

    public function index()
    {
        $data = [];
        return $this->view("posts/index", $data);
    }
}
