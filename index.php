<?php
    require("./lib/lib.php");
    require("./lib/db.php");
    require("./lib/session.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Plankton <?= request_path() . ' ' . get_version() ?></title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Security-Policy" content="default-src 'self'">
        <meta charset="UTF-8">
        <meta name="description" content="This is a small performant template for building smaller websites.">

        <link rel="stylesheet" href="/styles/normalize.css">
        <link rel="stylesheet" href="/styles/icons.css">
        <link rel="stylesheet" href="/styles/app.css">
        <link rel="stylesheet" href="/styles/home.css">
    </head>

    <body>
        <?php
            // uncomment this to see the route at the top of the page
            // only for debugging
            // print_r(request_path())
        ?>

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
        
        <script type="module">
        
          // Import the functions you need from the SDKs you need
        
          import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.4/firebase-app.js";
        
          import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.4/firebase-analytics.js";
        
          // TODO: Add SDKs for Firebase products that you want to use
        
          // https://firebase.google.com/docs/web/setup#available-libraries
        
        
          // Your web app's Firebase configuration
        
          // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        
          const firebaseConfig = {
        
            apiKey: "AIzaSyDo1zVdAyc2EFIXFZ_nsckeGnOuWPW2b5o",
        
            authDomain: "planktonjs-f75e5.firebaseapp.com",
        
            projectId: "planktonjs-f75e5",
        
            storageBucket: "planktonjs-f75e5.appspot.com",
        
            messagingSenderId: "888464065719",
        
            appId: "1:888464065719:web:ac57e8648000004a067932",
        
            measurementId: "G-6FYZ009BDH"
        
          };
        
        
          // Initialize Firebase
        
          const app = initializeApp(firebaseConfig);
        
          const analytics = getAnalytics(app);
        
        </script>
    </body>
</html>
