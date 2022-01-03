<?php
 require_once('conn.php');


$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT * FROM user2 WHERE email ='{$email}'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$hashedPassword = $row['password'];
$row['id'];

foreach($row as $key => $r){
    echo "{$key} : {$r} <br>";
}

$passwordResult = password_verify($password, $hashedPassword);
if ($passwordResult === true) {

    session_start();
    $_SESSION['userId'] = $row['id'];
    print_r($_SESSION);
    echo $_SESSION['userId'];
    
?>
    <script>
        alert("ログインしました。")
        location.href = "index.php";
    </script>
<?php
} else {

?>
    <script>
        alert("ログインに失敗しました。");
    </script>
<?php
}
?>