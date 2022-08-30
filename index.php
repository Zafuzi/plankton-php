<?php
    $version = '0.0.5 - Eggercough';

    require("./lib/console.php");
    require("./lib/db.php");
    require("./lib/session.php");

    function request_method(): string {
        return $_SERVER["REQUEST_METHOD"];
    }

    function request_path(): string
    {
        $request_uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $parts = array_diff_assoc($request_uri);
        if (empty($parts))
        {
            return '/';
        }
        $path = implode('/', $parts);
        if (($position = strpos($path, '?')) !== FALSE)
        {
            $path = substr($path, 0, $position);
        }
        if(empty($path))
        {
            return "home";
        }
        return $path;
    }

    function activeIfRouteActive(array $compareRoutes): string {
        return in_array(request_path(), $compareRoutes) ? 'active' : '';
    }

    function hideIfRouteActive(array $compareRoutes): string {
        return in_array(request_path(), $compareRoutes) ? 'hid' : '';
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
        <meta charset="UTF-8">
        <meta name="description" content="This is a small performant template for building smaller websites.">
        <title>Plankton <?= $version ?></title>

        <link rel="stylesheet" href="/styles/normalize.css">
        <link rel="stylesheet" href="/styles/icons.css">
        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/styles/home.css">
    </head>

    <body>
        <header class="padding">
            <h1>Plankton <?= $version?></h1>
            <nav>
                <a class="<?= activeIfRouteActive(['home'])?>" href="/">Home</a>
                <a class="<?= activeIfRouteActive(['help'])?>" href="/help">Help</a>
                <a class="<?= activeIfRouteActive(['editor'])?>" href="/editor?gameName=test_game_name">Editor</a>
                <a class="<?= activeIfRouteActive(['login', 'register'])?>" href="/login">Login</a>
            </nav>
        </header>

        <main class="padding">
            <?php
                if(activeIfRouteActive(['home'])) {
                    require('./views/home.php');
                }
                if(activeIfRouteActive(['help'])) {
                    require('./views/help.php');
                }
                if(activeIfRouteActive(['editor'])) {
                    require('./views/editor.php');
                }
                if(activeIfRouteActive(['login', 'register'])) {
                    require('./views/login.php');
                }
            ?>
        </main>
    </body>
</html>
