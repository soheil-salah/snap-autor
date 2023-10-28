<?php

function checkIfEmailIsValid($email) : bool
{
    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        return true;
    } 
    
    return false;
}

function uploads_path($getPath = null) {
    
    $path = str_replace('/', DIRECTORY_SEPARATOR, $getPath);

    return base_path('public'.DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR.$path);
}