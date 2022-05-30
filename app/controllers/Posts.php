<?php
class Posts extends Controller
{
    public function index()
    {
        $data = [];
        return $this->view("posts/index", $data);
    }
}
