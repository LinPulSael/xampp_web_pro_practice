<?php
$servername = "localhost";
$username = "root";
$password = "wjsansrk";
$dbname = "postmanage";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $post_id = $_GET['id'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM post WHERE num = $post_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $post = $result->fetch_assoc();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>게시글 삭제 확인</title>
            <style>
                body {font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;}

                header {background-color: #333; color: #fff; padding: 15px; text-align: center;}

                main {max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);}                }

                form {max-width: 600px; margin-top: 20px; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);}                }

                label {display: block; margin-bottom: 8px;  color: #555;}

                input[type="password"] {width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}

                input[type="submit"] {background-color: #333; color: #fff; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;}                }

                input[type="submit"]:hover {background-color: #45a049;}
            </style>
        </head>
        <body>

            <header>
                <h1>게시글 삭제 확인</h1>
            </header>

            <main>
                <form action="deletepost.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                    <label for="user_pw">게시글 비밀번호 확인: </label>
                    <input type="password" name="user_pw" id="user_pw" required>
                    <input type="submit" value="게시글 삭제">
                </form>
            </main>

        </body>
        </html>

<?php
    } else {
        echo "게시글이 존재하지 않습니다.";
    }

    $conn->close();
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $user_pw = $_POST['user_pw'];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM post WHERE num = $post_id";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $post = $result->fetch_assoc();

        // 비밀번호 확인
        if (password_verify($user_pw, $post['pw'])) {
            $delete_query = "DELETE FROM post WHERE num=$post_id";
            $delete_result = $conn->query($delete_query);

            if ($delete_result) {
                echo "게시글이 삭제되었습니다.";
                header("Location: listpost.php");
                exit();
            } else {
                echo "게시글 삭제에 실패했습니다.";
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