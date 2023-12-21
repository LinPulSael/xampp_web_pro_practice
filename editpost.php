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

    // 게시글을 불러오는 쿼리
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
            <title>게시글 수정</title>
            <style>
                body {font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;}

                header {background-color: #333; color: #fff; padding: 15px; text-align: center;}

                main {max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);}                }

                form {max-width: 600px; margin-top: 20px; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);}                }

                label {display: block; margin-bottom: 8px; color: #555;}

                input[type="text"], input[type="password"], textarea {
                    width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;
                }

                input[type="submit"] {background-color: #333; color: #fff; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;}

                input[type="submit"]:hover {background-color: #45a049;}
            </style>
        </head>
        <body>

            <header>
                <h1>게시글 수정</h1>
            </header>

            <main>
                <form action="updatepost.php" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

                    <label for="user_pw">  비밀번호 : </label>
                    <input type="password" name="user_pw" id="user_pw" required>

                    <label for="title">제목: </label>
                    <input type="text" name="title" id="title" value="<?php echo $post['title']; ?>" required>

                    <label for="content">내용: </label>
                    <textarea name="content" id="content" rows="4" required><?php echo $post['content']; ?></textarea>

                    <input type="submit" value="게시글 수정">
                </form>
            </main>

        </body>
        </html>

        <?php
    } else {
        echo "게시글이 존재하지 않습니다.";
    }

    $conn->close();
} else {
    echo "잘못된 접근입니다.";
}
?>