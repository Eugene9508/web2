<?php
require_once('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">

</head>
<body id="body">
<header>
    <h1><a href="index.php"> Yang's Coding study </a></h1>
</header>

  <nav>  
  <ol>      
 <?php

 $sql = "SELECT * FROM `topic`";
 $result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($result)){
     echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
 }

 ?>
 <a href="contents.php"> 問い合わせフォーム</a>

</ol>
</nav>
<div id="content">
<article>
 <?php
 if(empty($_GET['id'])){
 echo "ヤンのWebアプリケーションへようこそ";
 }else{

 
 $id=mysqli_real_escape_string($conn,$_GET['id']);
 $sql = "SELECT topic.id, topic.title, topic.description, user.name, topic.created FROM topic 
 LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$id;
 $result = mysqli_query($conn,$sql);
 $row = mysqli_fetch_assoc($result);
 ?> 

 <h2><?=htmlspecialchars($row['title'])?></h2>
 <div><?=htmlspecialchars($row['created'])?> | <?=htmlspecialchars($row['name'])?></div>
 <div><?=htmlspecialchars($row['description'])?></div>
<?php
 }
 ?>
 </article>
 <input type="button" name="name" value="White" onclick="document.getElementById('body').className=''">
 <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
 <a href="write.php">投稿</a>
 <a href="login.php">ログイン</a>
 <a href="signup.php">会員登録</a>
</div>
</body>
</html>
