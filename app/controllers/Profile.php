<?php
class Profile extends Controller
{
    public function __construct()
    {
        // Load the model Profile
        $this->profileModel = $this->model("UserProfile");
        $this->profilePostModel = $this->model("UserProfile");
    }

    // Home Page
    public function index()
    {

        if (!isLoggedIn()) {
            /**
             * If the user profile privacy is set to public, then anyone can view
             */
            redirect("pages/index");
        } else {
            $userProfile = $this->profileModel->getUserProfile($_SESSION["user_id"]);
            $posts = $this->profilePostModel->getPosts();
            $data = [
                "user" => $userProfile,
                "posts" => $posts,
            ];
            return $this->view("profile/index", $data);
        }
    }

    public function settings()
    {
        if (!isLoggedIn()) {
            redirect("pages/index");
        } else {
            $data = [];
            return $this->view("profile/settings", $data);
        }
    }

    public function edit()
    {
        if (!isLoggedIn()) {
            redirect("pages/index");
        } else {
            $data = [];
            return $this->view("profile/edit", $data);
        }
    }
}
