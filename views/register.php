<?php
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $register_errorMessage = "";

    $user = new User("");

    if ($requestMethod === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username === "" || $password === "")
        {
            $register_errorMessage = 'Must provide username and password!';
        }

        // attempt to login!
        $database = get_db_connection();

        $result = $database->getObj("SELECT username from users where username=? and pw_hash=?", [$username, password_hash($password, PASSWORD_DEFAULT)]);
        if($result !== null)
        {
            $user->setUsername($result[0]);
        }
        else
        {
            $register_errorMessage = 'User not found';
        }
    }
?>
<link rel="stylesheet" href="/styles/login.css">

