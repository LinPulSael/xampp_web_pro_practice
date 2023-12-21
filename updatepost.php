<?php
$servername = "localhost";
$username = "root";
$password = "wjsansrk";
$dbname = "postmanage";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $user_pw = $_POST['user_pw'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $post_query = "SELECT * FROM post WHERE num = $post_id";
    $post_result = $conn->query($post_query);

    if ($post_result && $post_result->num_rows > 0) {
        $post = $post_result->fetch_assoc();

        if (password_verify($user_pw, $post['pw'])) {
            $update_query = "UPDATE post SET title='$title', content='$content' WHERE num=$post_id";
            $update_result = $conn->query($update_query);

            if ($update_result) {
                echo "게시글이 수정되었습니다.";
                header("Location: listpost.php");
                exit();
            } else {
                echo "게시글 수정에 실패했습니다.";
            }
        } else {
            echo "비밀번호가 일치하지 않습니다.";
        }
    } else {
        echo "게시글이 존재하지 않습니다.";
    }

    $conn->close();
} else {
    echo "잘못된 접근입니다.";
}
?>