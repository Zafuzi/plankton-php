<?php
    $version = '0.0.4 - Dappledorf';

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

    function isActiveRoute(string $compareRoute): string
    {
        return $compareRoute === request_path() ? "active" : "";
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
                <a class="<?= isActiveRoute('home')?>" href="/">Home</a>
                <a class="<?= isActiveRoute('help')?>" href="/help">Help</a>
                <a class="<?= isActiveRoute('editor')?>" href="/editor?gameName=test_game_name">Editor</a>
            </nav>
        </header>

        <main class="padding">
            <?php
                if(isActiveRoute('home'))
                {
                    require('./views/home.php');
                }
                if(isActiveRoute('help'))
                {
                    require('./views/help.php');
                }
                if(isActiveRoute('editor')) {
                    require('./views/editor.php');
                }
            ?>
        </main>
    </body>
</html>
