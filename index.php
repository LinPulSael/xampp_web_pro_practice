<?php
$servername = "localhost";
$username = "root";
$password = "wjsansrk";
$dbname = "postmanage";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM post WHERE view >= 10 ORDER BY date DESC";
$result = $conn->query($sql); 
?>

<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 프로그램</title>
    <style>
        body {font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;}

        header {background-color: #333; color: #fff; padding: 15px; text-align: center;}

        nav {background-color: #555; padding: 10px; text-align: center;}

        nav a {color: #fff; text-decoration: none; padding: 10px; margin: 0 10px; display: inline-block;}

        nav a:hover {background-color: #777;}

        section {padding: 20px;}

        footer {background-color: #333; color: #fff; text-align: center; padding: 5px; position: fixed; bottom: 0; width: 100%;}

        section {text-align:center;}

        h2 {background : yellow; color:blue;}

        #popular-posts {margin-top: 20px; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);}
    </style>
</head>
<body>

    <header>
        <h1>이푸른새봄의 게시판 </h1>
    </header>

    <nav>
        <a href="index.php">홈</a>
        <a href="addpost.php">게시글 작성</a>
        <a href="listpost.php">게시글 목록</a>
    </nav>

    <section>
        <h2> 인기 게시글 </h2>

        <div id="popular-posts">

        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<article>";
                echo "<h3>{$row['title']}</h3>";
                echo "<h4> <p> 작성자: {$row['name']} / 조회수: {$row['view']}</p> </h4>";
                echo "<a href='viewpost.php?id={$row['num']}'>게시글로 이동</a>";
                echo "</article>";
            }
        } else {
            echo "조회수 10 이상인 게시글이 없습니다.";
        }
        ?>

    </section>


    <footer>
        © 2023 웹응용 기말과제 made by 이푸른새봄. All rights reserved.
    </footer>

</body>
</html>