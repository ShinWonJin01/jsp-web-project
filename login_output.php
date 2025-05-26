<?php
	include("header_output.php");
	include("db_connect.php");
	// 입력 값 받기
	$id = $_POST['id'] ?? '';
	$pw = $_POST['pw'] ?? '';

	// SQL Injection 방지를 위해 이스케이프
	$id = mysqli_real_escape_string($connect, $id);
	$pw = mysqli_real_escape_string($connect, $pw);

	// 사용자 정보 조회
	$sql = "SELECT * FROM member WHERE id = '$id'";
	$result = mysqli_query($connect, $sql);

	if (!$result || mysqli_num_rows($result) == 0) {
		echo "<script>alert('등록되지 않은 ID입니다.'); history.back();</script>";
		exit;
	}

	$row = mysqli_fetch_assoc($result);

	// 평문 비교 (보안 취약, 차후 password_hash 권장)
	if ($pw !== $row['pw1']) {
		echo "<script>alert('비밀번호가 틀립니다.'); history.back();</script>";
		exit;
	}

	// 로그인 성공 → 세션 저장
	$_SESSION['id'] = $row['id'];
	$_SESSION['name'] = $row['name'];

	// DB 연결 종료
	mysqli_close($connect);

	// 홈으로 이동
	echo "<script>alert('로그인 성공!'); location.href='home.php';</script>";
	exit;
?>
