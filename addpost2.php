<?php
$servername = "localhost";
$username = "root";
$password = "wjsansrk";
$dbname = "postmanage";

$name = $_POST['name'];
$id = $_POST['id'];
$plain_pw = $_POST['pw']; 
$hashed_pw = password_hash($plain_pw, PASSWORD_DEFAULT); // 받은 비밀번호를 해쉬처리
$title = $_POST['title'];
$content = $_POST['content'];
$date = date("Y-m-d H:i:s");


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO post (name, id, pw, title, content, date, view) VALUES ('$name', '$id', '$hashed_pw', '$title', '$content', '$date', 0)";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;

    $viewSql = "UPDATE post SET view = view + 1 WHERE num = $last_id";
    $conn->query($viewSql);

    header("Location: index.php?id=$last_id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>