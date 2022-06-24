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
        $currentUser = $this->postModel->getUserById($_SESSION["user_id"]);

        $data = [
            "posts" => $posts,
            "user" => $currentUser,
        ];
        return $this->view("posts/index", $data);
    }

    public function create()
    {
        $currentUser = $this->postModel->getUserById($_SESSION["user_id"]);
        // Check for POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize & Process Create Post Form

            // Post Image uploading validation
            $email = $_SESSION["email"];
            $email = explode("@", $email);
            $nameFromEmail = $email[0];
            $baseDir = "img/users/" . $nameFromEmail;

            // Remove all spaces, tabs, etc
            $filename = preg_replace("/\s+/", "", $_FILES["post_img"]["name"]);

            $data = [
                "user_id" => $_SESSION["user_id"],
                "title" => isset($_POST['title']) ? htmlspecialchars(trim($_POST["title"])) : "",
                "body" => htmlspecialchars(trim($_POST["body"])),

                "post_img" => !empty($_FILES["post_img"]["name"]) ? $baseDir . "/post/" . $filename : "",

                "post_video" => htmlspecialchars(trim($_POST["post_video"])),
                "user" => $currentUser,

                // Error variables
                "title_error" => "",
                "body_error" => "",
                "post_img_error" => "",
                "post_video_error" => "",
            ];

            // Validate Title
            if (strlen($data["title"]) > 255) {
                $data["title_error"] = "Title must be within 255 characters";
            }

            // Validate Post Image
            if (isset($_FILES["post_img"]) && !empty($_FILES["post_img"]["name"])) {
                $postImgDir = $baseDir . "/post/";
                $uploadedImg = $_FILES["post_img"];
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($uploadedImg["name"], PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["post_img"]["tmp_name"]);
                    if ($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $data["post_img_error"] = "Please try to upload an actual image";
                        $uploadOk = 0;
                    }
                }

                // Check if file already exists
                if (file_exists($postImgDir . $uploadedImg["name"])) {
                    $data["post_img_error"] = "Sorry, image already exists!";
                    $uploadOk = 0;
                }

                // Check file size
                if ($uploadedImg["size"] > 10 * MB) {
                    $data["post_img_error"] = "Sorry, your image is too heavy";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    $data["post_img_error"] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    $data["post_img_error"] = "Sorry, your image was not uploaded!";

                    // if everything is ok, try to upload file
                } else {
                    // Remove all spaces, tabs, etc
                    $filename = preg_replace("/\s+/", "", $uploadedImg["name"]);

                    if (move_uploaded_file($uploadedImg["tmp_name"], $postImgDir . $filename)) {
                        $data["post_img_error"] = "";
                    } else {
                        $data["post_img_error"] = "Sorry, there was an error uploading your image.";
                    }
                }
            }



            // Validate Video URL and return youtube video id
            if (!empty($data["post_video"])) {
                if (!filter_var($data["post_video"], FILTER_VALIDATE_URL)) {
                    $data["post_video_error"] = "Please provide a valid video url";
                }

                function get_youtube_id_from_url($url)
                {
                    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $results);
                    return $results[0];
                }

                $data["post_video"] = get_youtube_id_from_url($data["post_video"]);
            }

            // Validate a blank form
            if (empty($data["title"]) && empty($data["body"]) && (empty($data["post_img"]) || empty($data["post_video"]))) {
                $data["title_error"] = "Give a Title or Write Something";
                $data["body_error"] = "Write Something Or Leave it Blank";
                $data["post_img_error"] = "Please Provide a Valid Image Source";
                $data["post_video_error"] = "Give a Valid YouTube Link";
            }

            // Make sure no error
            /*
                * We're only gonna accept either just a title, or a body (one of these is must).
                *If user include any image/video, they're gonna show up too 
            */
            // !empty($data["title"]) || !empty($data["body"]) || $data["post_img"] || $data["post_video"]
            if (empty($data["title_error"]) || empty($data["body_error"]) && (empty($data["post_img_error"]) || empty($data["post_video_error"]))) {
                // Validated
                if ($this->postModel->createPost($data)) {
                    flash("post_message", "<i class='bi bi-check-circle'></i> Post Created Successfully!");
                    redirect("posts");
                } else {
                    flash("post_message", "Cannot Create The Post", "alert-danger");
                    die("Can't Process The Request At This Moment");
                }
            } else {
                // Load view with error
                return $this->view("posts/create", $data);
            }
        } else {
            // Load the view
            $data = [
                "title" => "",
                "post_img" => "",
                "post_video" => "",
                "body" => "",
                "user" => $currentUser,
            ];
            return $this->view("posts/create", $data);
        }
    }

    // Read More functionality for long posts
    public function read($postId)
    {
        // If post found, then show the page with content. otherwise redirect to homepage
        $post = $this->postModel->getPostById($postId);
        if ($post == true) {
            $currentUser = $this->postModel->getUserById($_SESSION["user_id"]);
            $postUser = $this->postModel->getPostUserById($post->user_id);
            // Load the view
            $data = [
                "post" => $post,
                "user" => $currentUser,
                "postUser" => $postUser,
            ];
            return $this->view("posts/read", $data);
        } else {
            redirect("posts");
        }
    }

    public function edit($postId)
    {
        $currentUser = $this->postModel->getUserById($_SESSION["user_id"]);
        // Check for POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize & Process Create Post Form
            // $_POST = htmlspecialchars(trim(INPUT_POST));


            $data = [
                "postId" => $postId,
                "user_id" => $_SESSION["user_id"],
                "title" => isset($_POST['title']) ? htmlspecialchars(trim($_POST["title"])) : "",
                "body" => htmlspecialchars(trim($_POST["body"])),
                "post_img" => htmlspecialchars(trim($_POST["post_img"])),
                "post_video" => htmlspecialchars(trim($_POST["post_video"])),
                "user" => $currentUser,

                // Error variables
                "title_error" => "",
                "body_error" => "",
                "post_img_error" => "",
                "post_video_error" => "",
            ];

            // Validate Title
            if (strlen($data["title"]) > 255) {
                $data["title_error"] = "Title must be within 255 characters";
            }

            // Validate Image URL
            if (!empty($data["post_img"])) {
                if (!@getimagesize($data["post_img"])) {
                    $data["post_img_error"] = "Please provide a valid image link";
                }
            }
            // Validate Video URL and return youtube video id
            if (!empty($data["post_video"])) {
                if (!filter_var($data["post_video"], FILTER_VALIDATE_URL)) {
                    $data["post_video_error"] = "Please provide a valid video url";
                }

                function get_youtube_id_from_url($url)
                {
                    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $results);
                    return $results[0];
                }

                $data["post_video"] = get_youtube_id_from_url($data["post_video"]);
            }

            // Validate a blank form
            if (empty($data["title"]) && empty($data["body"]) && (empty($data["post_img"]) || empty($data["post_video"]))) {
                $data["title_error"] = "Give a Title or Write Something";
                $data["body_error"] = "Write Something Or Leave it Blank";
                $data["post_img_error"] = "Please Provide a Valid Image Source";
                $data["post_video_error"] = "Give a Valid YouTube Link";
            }

            // Make sure no error
            /*
                * We're only gonna accept either just a title, or a body (one of these is must).
                *If user include any image/video link, they're gonna show up too 
            */
            // !empty($data["title"]) || !empty($data["body"]) || $data["post_img"] || $data["post_video"]
            if (empty($data["title_error"]) || empty($data["body_error"]) && (empty($data["post_img_error"]) || empty($data["post_video_error"]))) {
                // Validated
                if ($this->postModel->editPost($data)) {
                    flash("post_message", "<i class='bi bi-check2-square'></i> Post Edited Successfully!", "alert-info");
                    redirect("posts");
                } else {
                    flash("post_message", "Cannot Edit The Post", "alert-danger");
                    die("Can't Process The Request At This Moment");
                }
            } else {
                // Load view with error
                return $this->view("posts/edit", $data);
            }
        } else {
            $post = $this->postModel->getPostById($postId);
            // Check for owner
            if ($post->user_id === $_SESSION["user_id"]) {
                // Load the view
                $data = [
                    "postId" => $postId,
                    "title" => $post->title,
                    "body" => $post->body,
                    "post_img" => $post->post_img,
                    "post_video" => $post->post_video,
                    "user" => $currentUser,
                ];
                return $this->view("posts/edit", $data);
            } else {
                redirect("posts");
            }
        }
    }

    public function delete($postId)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Get Existing Post from model
            $post = $this->postModel->getPostById($postId);

            // Check for post owner
            if ($post->user_id != $_SESSION["user_id"]) {
                redirect("posts");
            } else {
                if ($this->postModel->deletePost($postId)) {

                    // delete the post image as well
                    unlink($post->post_img);

                    flash("post_message", "<i class='bi bi-trash3'></i> Post Removed Successfully!", "alert-danger");
                    redirect("posts");
                } else {
                    die("Something went wrong");
                }
            }
        } else {
            redirect("posts");
        }
    }
}
