<?php 
require_once '../init/init-posts.php';
$arr['posts'] = $post->list(10);
$arr['user'] = $user;
// var_dump($arr);die;
$arr = json_encode($arr);
echo $arr;