<?php
// Simple redirect function
function redirect($location)
{
    return header("Location:" . URL_ROOT . "/{$location}");
}
