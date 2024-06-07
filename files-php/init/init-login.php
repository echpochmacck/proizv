<?php
require_once 'init.php';

if ($user->request->get('user')) {
    // echo 'user';
    
    $json = $user->request->get('user');
    $json = json_decode($json);
    $login = $json->login;
    $password = $json->password;
     $bool = $user->login($login, $password);
    //  echo $password;
    if($bool){
    echo $user->token;
    } else {
        echo '';
    }

    // echo 'dsadsa';
    // echo $json;
    // echo $json;
    }
// echo 'response';
// if(($user->request->get('login'))){
//     // if()
//     $html = '';

// $bool = $user->login($user->request->get('login'), $user->request->get('password'));

// if($bool){
//     echo $user->token;
// }

// if ($bool) {
//     // var_dump($user->checkUnBlock())
//     if ($user->checkUnBlock()){
//     $response->redirect('/practice/');   
//     } else {
//         $date = $user->dateUnlock;
//         if ($user->dateUnlock === '1970-01-01 00:00:00') {
//             $mes = 'вы забанены навсегда';
//         } else {
//             $mes = "забанены до $date";
//         }
//         $user->logout();
//         $response->redirect('login.php',['block-messege'=>"$mes"]);
//     }
// } else {
//     $user->loginError = $user->validator->loginPswdError();
// }


