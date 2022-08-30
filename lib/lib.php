<?php
function get_version() : string {
    return '0.0.5 - Eggercough';
}

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
