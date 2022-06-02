<?php
class Profile extends Controller
{
    public function __construct()
    {
        // Load the model Profile
        $this->profileModel = $this->model("UserProfile");
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
            $data = [
                "user" => $userProfile,
            ];
            return $this->view("profile/index", $data);
        }
    }
}
