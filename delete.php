<?php
require_once './files-php/init/init-delete.php';
if ($user->request->get('post-id')) {
    $id = $user->request->get('post-id');
    // var_dump($user);die;
    $post->deletePost($user->id, $user->isAdmin, $id);
}

$response->redirect('/practice/');