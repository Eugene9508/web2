<?php
 require_once('conn.php');

$sql = "SELECT * FROM `user2`";
$hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

echo $hashedPassword;
$sql = "
    INSERT INTO user2
    (email, password, created)
    VALUES('{$_POST['email']}', '{$hashedPassword}', NOW()
    )";
echo $sql;
$result = mysqli_query($conn, $sql);

if ($result === false) {
    echo "保存に失敗しました.";
    echo mysqli_error($conn);
} else {
?>
    <script>
        alert("会員登録が完了しました。");
        location.href = "index.php";
    </script>
<?php
}
?>