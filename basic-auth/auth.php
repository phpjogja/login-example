<?php
require 'password.php';

if ($_POST) {
    // Email validation
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

    // Load database
    $db = json_decode(file_get_contents('db.json'), true);

    // Search username in database
    if (array_key_exists($email, $db)) {
        // Password verification
        $verification = password_verify($_POST['password'], $db[$email]);
    }

    echo ($verification)
    ? 'Authentication success.'
    : 'Authentication failed.';
}
