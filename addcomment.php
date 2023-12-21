<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "wjsansrk";
$dbname = "postmanage";

$nick = $_POST['nick'];
$comment = $_POST['comment'];


if (isset($_POST['post_num'])) {
    $post_num = $_POST['post_num'];
} else {
    $post_num = isset($_GET['post_num']) ? $_GET['post_num'] : 0;
}

$date = date("Y-m-d H:i:s");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($post_num) {
    // 댓글 작성 쿼리
    $sql = "INSERT INTO comment (nick, comment, date, post_num) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nick, $comment, $date, $post_num);

    if ($stmt->execute()) {
        header("Location: viewpost.php?id=$post_num");
    } else {
        echo "댓글 작성에 실패했습니다.";
    }
    $stmt->close();

    // 댓글 출력
    $comment_sql = "SELECT * FROM comment WHERE post_num = $post_num ORDER BY date DESC";
    $comment_result = $conn->query($comment_sql);

    if ($comment_result !== false && $comment_result->num_rows > 0) {
        while ($comment = $comment_result->fetch_assoc()) {
            echo "<p>{$comment['nick']} | {$comment['date']}</p>";
            echo "<p>{$comment['comment']}</p>";
        }
    } else {
        echo "댓글이 없습니다.";
    }
} else {
    echo "댓글 작성에 실패했습니다. 게시글 번호가 정의되지 않았습니다.";
}

$conn->close();
?>