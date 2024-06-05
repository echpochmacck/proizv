<?php 
require_once './files-php/init/init-delete-comment.php';
$comment = new Comment($user,$user->request->get('post-id'));
$comment->deleteComment($user->request->get('comment_id'));

// var_dump($response->getLink('post.php'));die;
$response->redirect('post.php',['post-id' => $user->request->get('post-id')]);