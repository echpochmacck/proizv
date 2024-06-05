<?php
// var_dump(__DIR__);
require_once __DIR__ . '/../autoload.php';
require_once __DIR__ . '/../config.php';

// $s = serialize($arrMenu);
// var_dump($s); 
// $un = unserialize($s);
// var_dump($un);
// var_dump(base64_encode($s));

// die;



$request = new Request();
$mysql = new Mysql($toSql);
$user = new User($request, $mysql);
$post = new Post($user);
$response = new Response($user, $post);
$menu = new Menu($arrMenu, $response, $user);

$superUser = new SuperUser($request, $mysql);

// var_dump($user);die;

// var_dump($post->replaceSmth('sadasd
// dasdasdad
// sdka/nsdao
// /n kskd'));die;