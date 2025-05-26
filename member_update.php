<?php
include("header_output.php");
include("db_connect.php");

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$phonenum = $_POST['phonenum'] ?? '';
$email = $_POST['email'] ?? '';
$sex = $_POST['sex'] ?? '';

$current_pw = $_POST['current_pw'] ?? '';
$new_pw1 = $_POST['new_pw1'] ?? '';
$new_pw2 = $_POST['new_pw2'] ?? '';

// 필수 정보 확인
if (!$id || !$name || !$phonenum || !$email || !$sex) {
  echo "<script>alert('모든 필수 정보를 입력해주세요.'); history.back();</script>";
  exit;
}

// 현재 DB에 저장된 비밀번호 가져오기
$sql_pw = "SELECT pw1 FROM member WHERE id = '$id'";
$result_pw = mysqli_query($connect, $sql_pw);
$db_pw_row = mysqli_fetch_assoc($result_pw);
$db_pw = $db_pw_row['pw1'];

// 비밀번호 변경 요청 시 처리
$update_pw = false;
if (!empty($current_pw) || !empty($new_pw1) || !empty($new_pw2)) {
  // 현재 비밀번호 미입력 또는 불일치
  if (empty($current_pw)) {
    echo "<script>alert('현재 비밀번호를 입력하세요.'); history.back();</script>";
    exit;
  }
  if ($current_pw !== $db_pw) {
    echo "<script>alert('현재 비밀번호가 일치하지 않습니다.'); history.back();</script>";
    exit;
  }
  // 새 비밀번호 입력 여부 확인
  if (empty($new_pw1) || empty($new_pw2)) {
    echo "<script>alert('새 비밀번호와 확인값을 모두 입력하세요.'); history.back();</script>";
    exit;
  }
  // 새 비밀번호 일치 확인
  if ($new_pw1 !== $new_pw2) {
    echo "<script>alert('새 비밀번호가 서로 일치하지 않습니다.'); history.back();</script>";
    exit;
  }

  $update_pw = true; // 비밀번호 수정 가능 상태
}

// 업데이트 쿼리
if ($update_pw) {
  $sql = "UPDATE member SET 
            name = ?, 
            phonenum = ?, 
            email = ?, 
            sex = ?, 
            pw1 = ?
          WHERE id = ?";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "ssssss", $name, $phonenum, $email, $sex, $new_pw1, $id);
} else {
  $sql = "UPDATE member SET 
            name = ?, 
            phonenum = ?, 
            email = ?, 
            sex = ?
          WHERE id = ?";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "sssss", $name, $phonenum, $email, $sex, $id);
}

$result = mysqli_stmt_execute($stmt);

if ($result) {
  $_SESSION['name'] = $name;
  echo "<script>alert('회원 정보가 수정되었습니다.'); location.href = 'home.php';</script>";
} else {
  echo "<script>alert('수정 실패: " . mysqli_error($connect) . "'); history.back();</script>";
}

mysqli_close($connect);
?>
