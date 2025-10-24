<?php

use Core\Response;

function dd($value){
    
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    echo parse_url($_SERVER['REQUEST_URI'])["path"];

    // die(); // will die everything after it..
}

function urlIs($value){
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $value;
}

function abort($code = Response::NOT_FOUND){
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}
function authorize($condition,$status=Response::FORBIDDEN){
    if (!$condition){
        abort($status);
    }
}

function base_path($path){
    return BASE_PATH.$path;
    // return __DIR__. '/../'.$path;
}

function view($path,$attributes=[]){
    extract($attributes); // extract: is used to Import variables into the current symbol table from an array
    return require base_path('/views/'.$path);
}

function redirect($path){
    header("location: {$path}");
    exit();
}

function old($key,$default=''){
    return Core\Session::get('old')[$key] ?? $default;
}