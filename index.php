<?php $conn = mysqli_connect('localhost', 'root', '', 'homepage')?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>홈페이지 문의 받아요</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <p class="logo">Homepage</p>
        <nav>
            <ul>
                <li>소개</li>
                <li>이야기</li>
                <li>일정</li>
                <?php
                    $sql = "SELECT * FROM page";
                    $result = mysqli_query($conn, $sql);
                    if (isset($_GET['id']) && ($_GET['id'] == 'admin' || $_GET['id'] == 'manager')){
                        $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
                        echo "<a href='select.php?id={$id}'><li>신청목록 조회</li></a>";
                    } elseif (isset($_GET['id'])) {
                        $id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
                        echo "<a href='insert.php?id={$id}'><li>홈페이지 신청</li></a>";
                    } else {
                        echo "";
                    }
                ?>
            </ul>
        </nav>
        <div class="btn_area">
            <button class="login">로그인</button>
            <button class="join">회원가입</button>
        </div>
    </header>
    <div class="content">
        <div class="content_text">
            <p>홈페이지 전문 업체 "홈페이지"</p>
        </div>
    </div>
    <footer>
        <p>Copyrightⓒ dbsxodnd.</p>
    </footer>

    <div class="login_modal">
        <h1>로그인</h1>
        <form action="login.php" method="post">
            <p><input type="text" name="userid" id="userid" placeholder="아이디"></p>
            <p><input type="password" name="userpw" id="userpw" placeholder="비밀번호"></p>
            <p class="login_btn_area">
                <input type="submit" value="제출">
                <input type="reset" value="취소" id="login_reset">
            </p>
        </form>
    </div>

    <div class="join_modal">
        <h1>회원가입</h1>
        <form action="join.php" method="post" onsubmit="return check(this)">
        <p class="id_check">
            <input type="text" name="joinid" id="joinid" placeholder="아이디">
            <button type="button" id="check_id">중복 확인</button>
        </p>
        <input type="hidden" name="idok" id="idok" value="0">
        <p><input type="text" name="name" id="name" placeholder="이름"></p>            
        <p><input type="password" name="joinpw" id="joinpw" placeholder="비밀번호"></p>
        <p><input type="password" id="pw_check" placeholder="비밀번호 확인"></p>
        <p class="join_btn_area">
            <input type="submit" value="제출" id="join_btn">
            <input type="reset" value="취소" id="join_reset">
        </p>
    </form>    

    </div>

    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="index.js"></script>
</body>
</html>