<?php
class Posts extends Controller
{
    public function __construct()
    {
        // Won't let user see the posts page if they're not logged in
        if (!isLoggedIn()) {
            redirect("users/login");
        }

        // Load the model Post
        $this->postModel = $this->model("Post");
    }

    public function index()
    {
        // Get Posts
        $posts = $this->postModel->getPosts();

        $data = [
            "posts" => $posts,
        ];
        return $this->view("posts/index", $data);
    }

    public function create()
    {
        $data = [
            "title" => "",
            "post_img" => "",
            "video_url" => "",
            "body" => "",
        ];
        return $this->view("posts/create", $data);
    }
}
