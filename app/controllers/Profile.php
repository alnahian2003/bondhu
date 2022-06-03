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
    public function index($userId = null)
    {
        $userId = $userId ?? $_SESSION['user_id'];

        if (!isLoggedIn() || !isset($userId)) {
            /**
             * If the user profile privacy is set to public, then anyone can view
             */
            redirect("pages/index");
        } else {
            $userProfile = $this->profileModel->getUserProfile($userId);
            $posts = $this->profilePostModel->getPostsByUser($userProfile->id);
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
            $userProfile = $this->profileModel->getUserProfile($_SESSION["user_id"]);

            $data = [
                "user" => $userProfile,
            ];
            return $this->view("profile/edit", $data);
        }
    }
}
