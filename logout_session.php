<?php
	session_start();              // 세션 시작

	session_unset();              // 모든 세션 변수 제거
	session_destroy();            // 세션 자체 파기

	// 로그아웃 완료 후 홈 화면으로 이동
	header("Location: home.php");
	exit;
?>