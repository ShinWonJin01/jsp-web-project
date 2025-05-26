<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>회원가입</title>
  <link rel="stylesheet" href="css/sign_up.css">
</head>
<body>
  <div id="wrapper">
	<div class="home-link">
		<a href="home.php">🏠 홈으로</a>
	</div>

 	<h1>회원가입</h1>
    <h4 class="note-required">* 표는 필수 항목입니다.</h4>

    <form name="user_form" method="post" action="sign_up_output.php">

      <h3><label for="name">이름 *</label></h3>
      <span class="box">
        <input type="text" id="name" class="int" name="name" maxlength="20" placeholder="이름 입력" required>
      </span>

      <h3><label for="sex">성별 *</label></h3>
      <span class="box gender_code">
        <label><input type="radio" name="sex" value="남자" checked> 남자</label>
  		<label><input type="radio" name="sex" value="여자"> 여자</label>
      </span>

      <h3><label for="id">아이디 *</label></h3>
      <span class="box">
        <input type="text" id="id" class="int" name="id" maxlength="20" placeholder="아이디 입력" required>
      </span>

      <h3><label for="pw1">비밀번호 *</label></h3>
      <span class="box">
        <input type="password" id="pw1" class="int" name="pw1" maxlength="20" placeholder="비밀번호 입력" required>
      </span>

      <h3><label for="pw2">비밀번호 확인 *</label></h3>
      <span class="box">
        <input type="password" id="pw2" class="int" name="pw2" maxlength="20" placeholder="비밀번호 확인" required>
      </span>

      <h3><label for="phonenum">휴대전화 *</label></h3>
      <span class="box">
        <input type="tel" id="phonenum" class="int" name="phonenum" maxlength="16" placeholder="전화번호 입력" required>
      </span>

      <h3><label for="email">본인확인 이메일 *</label></h3>
      <span class="box">
        <input type="email" id="email" class="int" name="email" maxlength="100" placeholder="이메일 입력" required>
      </span>

      <div class="btn_area">
        <button type="submit" id="btnJoin">가입하기</button>
      </div>
    </form>
  </div>
</body>
</html>
