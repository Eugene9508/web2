<?php
  require_once('conn.php');
  session_start();
// POST送信があるかないか判定

  // 各データを変数に格納
  $author = mysqli_real_escape_string($conn,$_POST['author']);
  $pass = mysqli_real_escape_string($conn,$_POST['pass']);
  $sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
  $sql2 = "SELECT * FROM `user` WHERE `pass` = '{$pass}'";
  $result = mysqli_query($conn,$sql);
  $result2 = mysqli_query($conn,$sql2);


  // eメールアドレスバリデーションチェック
  // 空白チェック
  if ($author === '') {
    $err_msg['author'] = '入力必須です';
  }

  // パスワードバリデーションチェック
  // 空白チェック
  if ($pass === '') {
    $err_msg['pass'] = '入力してください';

}
header('Location: index.php');
 
?>