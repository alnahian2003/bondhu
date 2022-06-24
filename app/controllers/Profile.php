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

            // Confirming The Delete of The User
            if (isset($_POST["delete"])) {
                if ($this->profileModel->delete($_SESSION["user_id"], $_SESSION["email"])) {
                    flash("delete_account_failed", "Account Deleted Successfully!");
                } else {
                    flash("delete_account_failed", "Couldn't Perform The Action Right Now!", "alert-warning");
                }
            }

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
                            $uploadOk = 1;
                        } else {
                            flash("profile_image_message", "File is not an image.", "alert-danger");
                            $uploadOk = 0;
                        }
                    }

                    // Check if file already exists
                    if (file_exists($profileImgDir . $uploadedImg["name"])) {
                        flash("profile_image_message", "Sorry, image already exists!", "alert-danger");
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($uploadedImg["size"] > 5 * MB) {
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
                        flash("profile_image_message", "Sorry, your image was not uploaded!", "alert-danger");
                        // if everything is ok, try to upload file
                    } else {
                        $filename = preg_replace("/\s+/", "", $uploadedImg["name"]);

                        if (move_uploaded_file($uploadedImg["tmp_name"], $profileImgDir . $filename)) {

                            $filepath = URL_ROOT . "/" . $profileImgDir . $filename;
                            $this->profileModel->uploadProfileImg($_SESSION["user_id"], $filepath);

                            flash("profile_image_message", "The file " . htmlspecialchars(basename($uploadedImg["name"])) . " has been uploaded.");
                        } else {
                            flash("profile_image_message", "Sorry, there was an error uploading your image.", "alert-danger");
                        }
                    }
                }


                // Cover Image uploading validation
                if (isset($_FILES["coverImg"]) && !empty($_FILES["coverImg"]["name"])) {
                    $coverImgDir = $baseDir . "/cover/";
                    $uploadedImg = $_FILES["coverImg"];
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($uploadedImg["name"], PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["coverImg"]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            flash("profile_image_message", "File is not an image.", "alert-danger");
                            $uploadOk = 0;
                        }
                    }

                    // Check if file already exists
                    if (file_exists($coverImgDir . $uploadedImg["name"])) {
                        flash("profile_image_message", "Sorry, image already exists!", "alert-danger");
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($uploadedImg["size"] > 10 * MB) {
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
                        flash("profile_image_message", "Sorry, your image was not uploaded!", "alert-danger");
                        // if everything is ok, try to upload file
                    } else {
                        // Remove all spaces, tabs, etc
                        $filename = preg_replace("/\s+/", "", $uploadedImg["name"]);

                        $filepath = URL_ROOT . "/" . $coverImgDir . $filename;
                        if ($this->profileModel->uploadCoverImg($_SESSION["user_id"], $filepath) && move_uploaded_file($uploadedImg["tmp_name"], $coverImgDir . $filename)) {
                            // exit();
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

                    // Error keys
                    "email_error" => "",
                    "username_error" => "",
                ];

                // Validate email
                if (isset($data["email"])) {
                    if (empty($data["email"])) {
                        $data["email_error"] = "You must provide an email address!";
                    } elseif (filter_var($data["email"], FILTER_VALIDATE_EMAIL) == false) {
                        $data["email_error"] = "Please provide a valid email address";
                    }
                }

                // Validate Username
                if (isset($data["username"])) {
                    // Only accept letters, numbers and underscore
                    if (!preg_match("/^[a-zA-Z0-9_-]+$/", $data["username"])) {
                        $data["username_error"] = "Username must only contain letters and numbers!";
                    }

                    // Check for  Username in DB
                    if ($this->profileModel->findByUsername($data["username"])) {
                        // Username found
                        $data["username_error"] = "Sorry, Username already exists!";
                    }
                }

                // Validate Birthdate
                if (!isset($data["birthdate"]) || $data["birthdate"] == "0000-00-00" || empty($data["birthdate"])) {
                    $data["birthdate"] = null;
                }

                // Make sure no error
                if (($data["username_error"] && $data["email_error"]) == "") {
                    if ($this->profileModel->editProfile(
                        $_SESSION["user_id"],
                        $data["username"],
                        $data["email"],
                        $data["bio"],
                        $data["workplace"],
                        $data["location"],
                        $data["birthdate"],
                        $data["relationship"]
                    )) {
                        redirect("profile");
                        flash("edit_profile_message", "<i class='bi bi-check2-circle'></i> Profile Edited Successfully");
                    } else {
                        flash("edit_profile_message", "Cannot Update Profile", "alert-danger");
                    }
                }
                // elseif (!(empty($_FILES["coverImg"]["name"]))) {
                //     flash("edit_profile_message", "<i class='bi bi-check2-circle'></i> Cover Photo Updated Successfully");
                //     redirect("profile");
                // }
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
            return $this->view("profile/edit", $data);
        }
    }
}
