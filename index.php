<?php
    include("./lib/lib.php");
    include("./lib/console.php");
    include("./lib/db.php");
    include("./lib/session.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
        <meta charset="UTF-8">
        <meta name="description" content="This is a small performant template for building smaller websites.">
        <title>Plankton <?= get_version() ?></title>

        <link rel="stylesheet" href="/styles/normalize.css">
        <link rel="stylesheet" href="/styles/icons.css">
        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/styles/home.css">
    </head>

    <body>

        <?php include('./views/header.php') ?>

        <main class="padding">
            <?php
                if(activeIfRouteActive(['home'])) {
                    include('./views/home.php');
                }
                if(activeIfRouteActive(['help'])) {
                    include('./views/help.php');
                }
                if(activeIfRouteActive(['editor'])) {
                    include('./views/editor.php');
                }
                if(activeIfRouteActive(['login', 'register'])) {
                    include('./views/login.php');
                }
            ?>
        </main>
    </body>
</html>
