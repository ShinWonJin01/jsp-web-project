<?php
include("header_output.php");
include("db_connect.php");

// POST로 받은 값
$send_id = $_POST["send_id"] ?? '';
$rv_id = $_POST["rv_id"] ?? '';
$subject = $_POST["subject"] ?? '';
$content = $_POST["content"] ?? '';
$date = date('Y-m-d H:i:s');

// 유효성 검사
if (!$send_id || !$rv_id || !$subject || !$content) {
    echo "<script>alert('모든 내용을 입력해주세요.'); history.back();</script>";
    exit;
}

// 쿼리 실행
$query = "INSERT INTO message (send_id, rv_id, subject, content, reg_date)
          VALUES ('$send_id', '$rv_id', '$subject', '$content', '$date')";
$result = mysqli_query($connect, $query);

if ($result) {
    echo "<script>alert('쪽지가 성공적으로 보내졌습니다.'); location.href = 'message_box.php?mode=send';</script>";
} else {
    echo "<script>alert('쪽지 전송에 실패했습니다.'); history.back();</script>";
}

mysqli_close($connect);
?>
