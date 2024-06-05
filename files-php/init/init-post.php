<?php
require_once 'init.php';
// var_dump($user->request->get('post-id'));die;
if ( $user->request->get('post-id') ) {
    // var_dump($user);die;
    $post->id = $user->request->get('post-id');
    $post->findOne();
   
    if ($user->request->post('message')&& !$user->isAdmin && !$user->isGuest) {
        // var_dump($user->request->post('message'));die;
        $comment = new Comment( $user, $post->id, $user->request->post());
        if ($user->request->get('comment_id')) {
            $comment->comment_id = $user->request->get('comment_id');
        }
        // var_dump(($comment));die;
       if ($comment->save())
       $response->redirect('/practice/post.php', ['post-id' => $post->id]);
    }
} else {
    $response->redirect('/practice/');
}