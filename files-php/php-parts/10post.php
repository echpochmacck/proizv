<?php 
require_once '../init/init-posts.php';
$arr = json_encode($post->list(10));
// var_dump($arr);die;
echo $arr;