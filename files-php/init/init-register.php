<?php
require_once 'init.php';

if ($user->request->isPost) {
  // var_ ump($_FILES);die;
  // var_dump($user->request->post());die;
  $user->load(($user->request->post()));
  if ($user->save()) {
    // var_dump($user);
    $user->login($user->login, $user->password);
    // var_dump($user);
    // Response::location('/practice/', Response::prepareParams('token=' . $user->token));
    $response->redirect('/practice/');
  } 
}

//  if (array_key_exists('query',  $request->geturl())) {
//   // выделяем ток параметры
//   $params = $request->geturl()['query'];
//   // var_dump($params);
//   $params = Asist::deCode($params);
//   // получаем ключи и згначения
//   $params = (Asist::getData($params));
//   $user->load($params);
// }
