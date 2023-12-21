<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글 작성</title>
    <style>
        body {font-family: 'Arial', sans-serif; margin: 0; padding: 0; background-color: #f5f5f5; }

        header {background-color: #333; color: #fff; padding: 15px; text-align: center;}

        form {max-width: 80%; margin: 100px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); text-align:center;}       }

        label {display: block; margin-bottom: 8px; color: #555;}

        input[type="text"],textarea {width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;}

        input[type="submit"] {background-color: #333; color: #fff; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s;}

        #warning {background : black; color:white;}

        nav {background-color: #555; padding: 10px; text-align: center;}

        nav a {color: #fff; text-decoration: none; padding: 10px; margin: 0 10px; display: inline-block;}

        nav a:hover {background-color: #777;}


    </style>
</head>
<body>

    <header>
        <h1>게시글 작성</h1>
    </header>

    <nav>
        <a href="index.php">홈</a>
        <a href="addpost.php">게시글 작성</a>
        <a href="listpost.php">게시글 목록</a>
    </nav>

    <form action="addpost2.php" method="post">
        <label for="name">이름 (닉네임) 입력 </label>
        <input type="text" name="name" id="name">
        <label for="id">아이디 입력</label>
        <input type="text" name="id" id="id" required>
        <label for="pw">비밀번호 <span id="warning">게시글 수정, 게시글 삭제시에 필요하므로 꼭 기억하세요</span> </label>
        <input type="password" name="pw" id="pw" required>
        <br>

        <label for="title"> 게시글 제목 </label> 
        <input type="text" name="title" id="title" required>
        <br>
        <label for="content">게시글 내용 </label>
        <textarea name="content" id="content" rows="4" required></textarea>
        <br>
        <input type="submit" value="게시글 작성">
    </form>
        

</body>
</html>