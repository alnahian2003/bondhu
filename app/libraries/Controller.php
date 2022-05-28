<?php

/**
 * This is the Base Controller
 * This loads the Models and Views 
 */

class Controller
{
    // Load Model
    public function model($model)
    {
        // Require model file
        require_once "../app/models/{$model}.php";

        // Instantiate the model
        return new $model();
    }
    // Load View
    public function view($view, $data = [])
    {
        // Check for view file
        if (file_exists("../app/views/{$view}.php")) {
            // if view exist, then require it
            require_once "../app/views/{$view}.php";
        } else {
            die("View does not exist");
        }
        // return new $view();
    }
}
