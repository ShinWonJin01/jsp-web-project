<?php
include("header_output.php");
include("db_connect.php");

// 값 받기
$id = $_SESSION['id'] ?? 'guest';  // 로그인한 사용자 ID (없으면 guest)
$name = $_POST['name'] ?? '';
$subject = $_POST['title'] ?? '';  
$content = $_POST['content'] ?? '';

// 파일 업로드 처리
$upload_name = "";
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
    $upload_name = basename($_FILES['upfile']['name']);
    $target = "uploads/" . $upload_name;
    move_uploaded_file($_FILES['upfile']['tmp_name'], $target);
}

// 유효성 검사
if (!$name || !$subject || !$content) {
    echo "<script>alert('필수 항목을 모두 입력하세요.'); history.back();</script>";
    exit;
}

// INSERT 실행
$sql = "INSERT INTO board (id, name, subject, content, upfile)
        VALUES ('$id', '$name', '$subject', '$content', '$upload_name')";
$result = mysqli_query($connect, $sql);

if ($result) {
    echo "<script>alert('글이 등록되었습니다.'); location.href='_board_list.php';</script>";
} else {
    echo "<script>alert('등록 실패: " . mysqli_error($connect) . "'); history.back();</script>";
}
?>
