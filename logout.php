<?php
require_once './files-php/init/init-logout.php';
// var_dump($user);die;

// var_dump($user);
$user->logout();
// var_dump($user);
$response->redirect('/practice/');
