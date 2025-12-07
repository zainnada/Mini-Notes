<?php

use Core\Response;

function dd($value)
{

    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    echo parse_url($_SERVER['REQUEST_URI'])["path"];
}

function urlIs($value)
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes); // extract: is used to Import variables into the current symbol table from an array
    return require base_path('/views/' . $path);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}

function old($key, $default = '')
{
    return Core\Session::get('old')[$key] ?? $default;
}

function timeAgo($datetime)
{
    $timestamp = strtotime($datetime);
    $diff = time() - $timestamp + 7200; // #
    // 7200:2 hours, the difference between the UTC timezone and my timezone
    // # Will edit in the future, to be more dynamic
    if ($diff < 60) return "a few seconds ago";
    if ($diff < 3600) return floor($diff / 60) . " minutes ago";
    if ($diff < 86400) return floor($diff / 3600) . " hours ago";
    return floor($diff / 86400) . " days ago";
}
