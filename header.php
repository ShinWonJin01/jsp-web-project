<?php
include("header_output.php");
$isLoggedIn = isset($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <title>Header</title>
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
    <nav id="topMenu">
        <ul>
            <li><a href="home.php">홈</a></li>
            <li><a href="board.php">게시판</a></li>
            <li><a href="notice.php">공지사항</a></li>

            <?php if ($isLoggedIn): ?>
                <li><a href="message_form.php">쪽지</a></li>
                <li><a href="member_form.php">정보수정</a></li>
                <li><a href="logout_session.php">로그아웃</a></li>
                <li class="welcome">👤 <?php echo $_SESSION['name']; ?> 님</li>
            <?php else: ?>
                <li><a href="login.php">로그인</a></li>
                <li><a href="sign_up.php">회원가입</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</body>
</html>
