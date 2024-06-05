<?php
require_once 'init.php';

if($user->isAdmin()){
    $response->redirect('/practice/post.php');
}

if ($user->request->get('post-id')) { 
    $post->id = $user->request->get('post-id');
    $post->findOne();
if ($user->id === $post->user_id) {
    // var_dump($post);die;
    $post->formatnorm();
} else {
    $response->redirect('/practice/');
}
}


if ($user->request->post()) {
    if (!$user->isGuest && !$user->isAdmin) {
        // var_dump($_FILES);die;
        $post->load($user->request->post());
        if ($post->save($user->id)) {
            $response->redirect('/practice/post.php', ['post-id' => $post->id]);
        }else{
            $response->redirect('/practice/post.php',['post-id' => $post->id]);
        }
    }
}