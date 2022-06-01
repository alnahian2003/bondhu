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
        // Check for POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize & Process Create Post Form
            // $_POST = htmlspecialchars(trim(INPUT_POST));

            $data = [
                "user_id" => $_SESSION["user_id"],
                "title" => htmlspecialchars(trim($_POST["title"])),
                "body" => htmlspecialchars(trim($_POST["body"])),
                "post_img" => htmlspecialchars(trim($_POST["post_img"])),
                "post_video" => htmlspecialchars(trim($_POST["post_video"])),

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

            // Make sure no error
            /*
                * We're only gonna accept either just a title, or a body (one of these is must).
                *If user include any image/video link, they're gonna show up too 
            */
            if (!empty($data["title"]) || !empty($data["body"]) || $data["post_img"] || $data["post_video"]) {
                // Validated
                if ($this->postModel->createPost($data)) {
                    flash("post_message", "Post Created Successfully!");
                    redirect("posts");
                } else {
                    flash("post_message", "Cannot Created The Post", "alert-danger");
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
            ];
            return $this->view("posts/create", $data);
        }
    }

    // Read More functionality for long posts
    public function read($postId)
    {
        $post = $this->postModel->getPostById($postId);
        $postUser = $this->postModel->getPostUserById($post->user_id);
        // Load the view
        $data = [
            "post" => $post,
            "user" => $postUser,
        ];
        return $this->view("posts/read", $data);
    }
}
