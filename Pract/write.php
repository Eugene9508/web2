<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">

</head>
<body id="body">
<header>
    <h1><a href="index.php"> Yang's Coding study </a></h1>
</header>

  <nav>  
  <ol>      
 <?php
 require_once('conn.php');
 $sql = "SELECT * FROM `topic`";
 $result = mysqli_query($conn, $sql);
 while($row = mysqli_fetch_assoc($result)){
     echo '<li><a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>';
 }
 ?>
</ol>
</nav>
<div id="content">
<article>
    <form action="pro.php" class="" method="POST">
    <h3>投稿</h3>
<p>
<label for=""><span>題名</span>
<input id="title" type = "text" name = "title">
</p>
<p>
　　<label for=""><span>作成者</span>
    <input id ="author" type="text" name="author"　value="">
</p>
<p>
　　<label for=""><span>内容</span>
    <textarea id="description" name="description" id="" cols="50" rows="5"></textarea>
    </br>
</p>


<p>
    <input type="submit" value = "転送">
</p>
    </form>

</article>
 <input type="button" name="name" value="White" onclick="document.getElementById('body').className=''">
 <input type="button" name="name" value="Black" onclick="document.getElementById('body').className='black'">
 <a href="write.php"> </a>
</div>
</body>
</html>