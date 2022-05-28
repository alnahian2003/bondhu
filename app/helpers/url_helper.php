<?php
// Simple redirect function
function redirct($location)
{
    return header("Location:" . URL_ROOT . "/{$location}");
}
