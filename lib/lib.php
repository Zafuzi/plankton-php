<?php
function get_version() : string {
    return '0.0.5 - Eggercough';
}

function request_method(): string {
    return $_SERVER["REQUEST_METHOD"];
}

function request_path(): string{
    // DON'T EVER USE THIS AS AN ARGUMENT TO THE DATABASE TO AVOID XSS
    // remove beginning and ending / from uri
    $request_uri = htmlspecialchars_decode(trim($_SERVER['REQUEST_URI'], '/'), ENT_QUOTES);

    // split the path on each remaining /
    $parts = explode('/', $request_uri);

    // this happens if the route is '/'
    if (empty($parts)) {
        return '/';
    }

    // if the path contains query args
    $path = $request_uri;
    $position = strpos($path, '?');

    if ($position !== FALSE) {
        // remove the query args
        $path = substr($path, 0, $position);
    }

    // if the route was '/' then we return 'home' instead
    if(empty($path)) {
        return 'home';
    }

    return $path;
}

function activeIfRouteActive(array $compareRoutes): string {
    return in_array(request_path(), $compareRoutes) ? 'active' : '';
}

function hideIfRouteActive(array $compareRoutes): string {
    return in_array(request_path(), $compareRoutes) ? 'hid' : '';
}

function logError($data): void
{
    $console = $data;
    if (is_array($console))
    {
        $console = implode(',', $console);
    }

    echo "<script>console.error('ERROR: " . $console . "' );</script>";
}
function logInfo($data): void
{
    $console = $data;
    if (is_array($console))
    {
        $console = implode(',', $console);
    }

    echo "<script>console.log('Info: " . $console . "' );</script>";
}
