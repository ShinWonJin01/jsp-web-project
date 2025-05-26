<?php
	include("header_output.php");
	include("db_connect.php");

	// 입력값 받기
	$name = $_POST['name'] ?? '';
	$gender = $_POST['sex'] ?? '';
	$id = $_POST['id'] ?? '';
	$pw1 = $_POST['pw1'] ?? '';
	$pw2 = $_POST['pw2'] ?? '';
	$phonenum = $_POST['phonenum'] ?? '';
	$email = $_POST['email'] ?? '';

	// 필수입력 체크
	if ($name == "" || $gender == "" || $id == "" || $pw1 == "" || $pw2 == "" || $phonenum == "") {
		echo "<script>alert('필수입력란을 정확히 입력하십시오.'); history.back();</script>";
		exit;
	}

	// 비밀번호 확인
	if ($pw1 !== $pw2) {
		echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
		exit;
	}

	// SQL 인젝션 방지
	$name = mysqli_real_escape_string($connect, $name);
	$gender = mysqli_real_escape_string($connect, $gender);
	$id = mysqli_real_escape_string($connect, $id);
	$phonenum = mysqli_real_escape_string($connect, $phonenum);
	$email = mysqli_real_escape_string($connect, $email);

	// DB에 저장
	$sql = "INSERT INTO member (name, sex, id, pw1, phonenum, email)
			VALUES ('$name', '$gender', '$id', '$pw1', '$phonenum', '$email')";
	$result = mysqli_query($connect, $sql);

	// 결과 처리
	if (!$result) {
		echo "<script>alert('저장에 문제가 생겼습니다.'); history.back();</script>";
		echo mysqli_error($connect);
	} else {
		echo "<script>alert('회원가입이 완료되었습니다.'); location.href = 'home.php';</script>";
	}
?>
