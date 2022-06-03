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
            $userProfile = $this->profileModel->getUserProfile($_SESSION["user_id"]);
            $data = [
                "user" => $userProfile,
            ];
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

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Profile Image uploading validation
                $email = $data["user"]->email;
                $email = explode("@", $email);
                $nameFromEmail = $email[0];
                $baseDir = "img/users/" . $nameFromEmail;

                if (isset($_FILES["profileImg"]) && !empty($_FILES["profileImg"]["name"])) {
                    $profileImgDir = $baseDir . "/profile/";
                    $uploadedImg = $_FILES["profileImg"];
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($uploadedImg["name"], PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["profileImg"]["tmp_name"]);
                        if ($check !== false) {
                            echo "File is an image - " . $check["mime"] . ".";
                            $uploadOk = 1;
                        } else {
                            echo "File is not an image.";
                            $uploadOk = 0;
                        }
                    }

                    // Check if file already exists
                    if (file_exists($profileImgDir . $uploadedImg["name"])) {
                        flash("profile_image_message", "Sorry, image already exists!", "alert-danger");
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($uploadedImg["size"] > 500000) {
                        flash("profile_image_message", "Sorry, your image is too large.", "alert-danger");
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        flash("profile_image_message", "Sorry, only JPG, JPEG, PNG & GIF files are allowed!", "alert-danger");
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        flash("profile_image_message", "Sorry, your file was not uploaded!", "alert-danger");
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($uploadedImg["tmp_name"], $profileImgDir . $uploadedImg["name"])) {

                            $filepath = URL_ROOT . "/" . $profileImgDir . $uploadedImg["name"];
                            $this->profileModel->uploadProfileImg($_SESSION["user_id"], $filepath);

                            flash("profile_image_message", "The file " . htmlspecialchars(basename($uploadedImg["name"])) . " has been uploaded.");

                            exit();
                        } else {
                            flash("profile_image_message", "Sorry, there was an error uploading your image.", "alert-danger");
                        }
                    }
                }

                $data = [
                    "user" => $userProfile,
                    "username" => htmlspecialchars(trim($_POST["username"])),
                    "email" => htmlspecialchars(trim($_POST["email"])),
                    "bio" => htmlspecialchars(trim($_POST["bio"])),
                    "workplace" => htmlspecialchars(trim($_POST["company_name"])),
                    "location" => htmlspecialchars(trim($_POST["location"])),
                    "birthdate" => htmlspecialchars(trim($_POST["birthdate"])),
                    "relationship" => htmlspecialchars(trim($_POST["relationship"])),
                ];

                // Validate email
            } else {
                $data = [
                    "user" => $userProfile,
                    "username" => "",
                    "email" => "",
                    "bio" => "",
                    "workplace" => "",
                    "location" => "",
                    "birthdate" => "",
                    "relationship" => "",
                ];
            }
            print_r($data);
            return $this->view("profile/edit", $data);
        }
    }
}
