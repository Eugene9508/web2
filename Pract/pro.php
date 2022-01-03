<?php

 
// データベースに接続
require_once('conn.php');
//作成者がuser　tableに存在しているか
$author = mysqli_real_escape_string($conn,$_POST['author']);
$sql = "SELECT * FROM `user` WHERE `name` = '{$author}'";
$result = mysqli_query($conn,$sql);

if($result->num_rows > 0){
//存在するならuser.idを特定する
 $row = mysqli_fetch_assoc($result);
 $user_id = $row['id'];
} else{
//存在しないなら作成者をuser tableに追加後idを特定する
$sql = "INSERT INTO `user` (`id`,`name`) VALUES(NULL,'{$author}');";
$result = mysqli_query($conn, $sql);
$user_id= mysqli_insert_id($conn);

}
$title = mysqli_real_escape_string($conn,$_POST['title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$sql = "INSERT INTO `topic` (`id`, `title`, `description`, `author`, `created`) 
VALUES (NULL, '{$title}', '{$description}', '{$user_id}', now());";

mysqli_query($conn,$sql);
header('Location: index.php');


//題名、作成者などをtopic tableに追加
?>