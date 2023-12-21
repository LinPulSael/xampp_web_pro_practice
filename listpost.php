<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 목록</title>
    <style>
        body {font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f5f5f5;}

        header {background-color: #333; color: #fff; padding: 15px; text-align: center; }

        main {max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px;
            border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  }

        article {border-bottom: 1px solid #ddd; padding: 10px 0; margin-bottom: 10px;}

        h2 {color: #333;}

        p {color: #555;}

        a {color: #4caf50; text-decoration: none; font-weight: bold;}

        a:hover {text-decoration: underline;}

        nav {background-color: #555; padding: 10px; text-align: center;}

        nav a {color: #fff; text-decoration: none; padding: 10px; margin: 0 10px; display: inline-block;}

        nav a:hover {background-color: #777;}


        input[type="text"]#search {width: 600px; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}

        footer {background-color: #333; color: #fff; text-align: center; padding: 5px; position: fixed; bottom: 0; width: 100%; margin-top:30px;}
    </style>
</head>
<body>

    <header>
        <h1>게시글 목록</h1>
    </header>

    <nav>
        <a href="index.php">홈</a>
        <a href="addpost.php">게시글 작성</a>
        <a href="listpost.php">게시글 목록</a>
    </nav>

    <main>
        <form action="listpost.php" method="get">
            <label for="search">게시글 제목 검색 </label>
            <input type="text" name="search" id="search" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <input type="submit" value="검색">
        </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "wjsansrk";
        $dbname = "postmanage";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // 페이지 수와 검색을 위한 변수 선언
        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $search_term = isset($_GET['search']) ? $_GET['search'] : '';

        $posts_per_page = 10; // 한 페이지 게시글 10개 제한
        $start_index = ($current_page - 1) * $posts_per_page;

        $sql = "SELECT * FROM post";

        if (!empty($search_term)) {
            $sql .= " WHERE title LIKE '%$search_term%'";
        }

        $sql .= " ORDER BY date DESC LIMIT $start_index, $posts_per_page"; 

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($post = $result->fetch_assoc()) {
    ?>
        
        <article>
            <h2><a href="viewpost.php?id=<?php echo $post['num']; ?>"><?php echo $post['title']; ?></a></h2>
            <p>작성일: <?php echo $post['date']; ?> | 작성자: <?php echo $post['name']; ?> | 조회수: <?php echo $post['view']; ?></p>
        </article>
    
    <?php
            }
        } else {
            echo "검색 결과가 없습니다.";
        }

        $total_posts_query = "SELECT COUNT(*) as total FROM post";
        
        if (!empty($search_term)) {
            $total_posts_query .= " WHERE title LIKE '%$search_term%'";
        }

        $total_posts_result = $conn->query($total_posts_query);
        $total_posts = $total_posts_result->fetch_assoc()['total'];

        $total_pages = ceil($total_posts / $posts_per_page);

        echo "<div>페이지: ";
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $current_page) {
                echo "<strong>$i</strong> ";
            } else {
                echo "<a href='listpost.php?page=$i&search=$search_term'>$i</a> ";
            }
        }
        echo "</div>";
        
        $conn->close();
    ?>


    </main>

    <footer>
        © 2023 웹응용 기말과제 made by 이푸른새봄. All rights reserved.
    </footer>

</body>
</html>