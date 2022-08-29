<?php
    $version = '0.0.1 - Alphonse';
?>

<!doctype html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
        <meta charset="UTF-8">
        <meta name="description" content="This is a small performant template for building smaller websites.">
        <title>Plankton <?= $version ?></title>

        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/ionicons.css">
        <link rel="stylesheet" href="styles/app.css">
    </head>
    <h1>Plankton <?= $version?></h1>
    <p>
        <?php
            $test = 'Hello World!';
            echo $test . 'This is a paragraph';
        ?>
    </p>
</html>
