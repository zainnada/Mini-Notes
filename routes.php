<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');
$router->get('/contact', 'contact.php');

$router->get('/notes', 'notes/index.php')->only('auth');

$router->get('/note', 'notes/show.php')->only('auth');;
$router->delete('/note', 'notes/destroy.php');

$router->get('/note/edit', 'notes/edit.php')->only('auth');
$router->patch('/note/edit', 'notes/update.php');

$router->get('/notes/create', 'notes/create.php')->only('auth');
$router->post('/notes/create', 'notes/store.php');


$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php');


$router->get('/login', 'session/login.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

