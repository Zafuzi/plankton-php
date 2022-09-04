<?php
    $login_errorMessage = "";

    /**
     * Tries to log-in, returns true if it succeeds and false if fails
    * @return bool
    */
    function login(): bool
    {
        if (request_method() !== "POST") {
            return false;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username === "" || $password === "") {
            $login_errorMessage = 'Must provide username and password!';
            return false;
        }

        return true;
    }

    /**
     * Tries to register, returns true if it succeeds and false if fails
     * @return bool
     */
    function register(): bool
    {
        if (request_method() !== "POST") {
            return false;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        if ($username === "" || $password === "" || $email === "") {
            $login_errorMessage = 'Must provide username and password!';
            return false;
        }

        return true;
    }

    function hidIfNoErrorMessage(string $error): string
    {
        return $error === "" ? 'hid' : '';
    }

    if(request_method() === "POST" && request_path() === "login")
    {
       login();
    }

    if(request_method() === "POST" && request_path() === "register")
    {
        $login_errorMessage = register() ? "Success" : "Failure";
    }
?>

<link rel="stylesheet" href="/styles/login.css">

<p> <?= print_r($_SESSION) ?> </p>
<p class="assertive <?= hidIfNoErrorMessage($login_errorMessage) ?>">
    <?= $login_errorMessage ?>
</p>

<article class="<?= hideIfRouteActive(['register']) ?>">
    <h1>Login <i class="icon icon-unlock"></i></h1>
    <form class="flex flow-column gap-16" method="POST" action="/login" id="loginForm">


        <label class="flex flow-column gap-8">
            Username
            <input type="text" placeholder="username" name="username" required>
        </label>
        <label class="flex flow-column gap-8">
            Password
            <input type="password" placeholder="password" name="password" required>
        </label>
        <div class="flex flow-row-wrap align-center justify-space-between gap-8">
            <p>
                Need an account?
                <a href="/register">Register here.</a>
            </p>
            <button class="button button-positive margin-left-auto">Login</button>
        </div>
    </form>
</article>

<article class="<?= hideIfRouteActive(['login']) ?>">
    <h1>Register <i class="icon icon-lock"></i></h1>

    <form class="flex flow-column gap-16" method="POST" action="/register" id="registerForm">
        <label class="flex flow-column gap-8">
            Username
            <input type="text" placeholder="username" name="username">
        </label>
        <label class="flex flow-column gap-8">
            Email
            <input type="text" placeholder="email" name="email">
        </label>
        <label class="flex flow-column gap-8">
            Password
            <input type="password" placeholder="password" name="password">
        </label>
        <div class="flex flow-row-wrap align-center justify-space-between gap-8">
            <p>
                Already have an account?
                <a href="/login">Login here.</a>
            </p>
            <button class="button button-positive margin-left-auto">Register</button>
        </div>
    </form>
</article>
