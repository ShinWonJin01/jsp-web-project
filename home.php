<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>TRAVEL - 메인</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <!-- 이미지 영역만 따로 분리 -->
    <div class="main-visual">
        <div class="main-overlay">
            <h1>TRAVEL</h1>
            <p class="tagline">- Going on a trip -</p>
        </div>
    </div>

    <!-- 본문 콘텐츠 -->
    <section class="home-content">
        <section class="section-tip">
            <h3>💡 오늘의 여행 팁</h3>
            <blockquote>낯선 도시에서는 먼저 시장을 가보세요. 현지 분위기를 가장 잘 느낄 수 있어요!</blockquote>
        </section>

        <section class="section-season">
            <h3>🌸 5월 추천 여행지</h3>
            <div class="tags">
                <span>#춘천 남이섬</span>
                <span>#보성 녹차밭</span>
                <span>#태안 튤립축제</span>
            </div>
        </section>

        <section class="section-review">
            <h3>📢 여행자들의 이야기</h3>
            <blockquote>“성산일출봉 진짜 최고예요… 새벽에 가면 감동 두 배!”</blockquote>
            <blockquote>“강릉 카페거리는 예쁜 카페 천국이에요 :)”</blockquote>
        </section>

        <section class="section-feature">
            <div class="feature-links">
            <a href="recommend.php" class="feature-card">
                🎯 랜덤 여행지 추천
                <span>매일 새로운 여행지를 만나보세요</span>
            </a>
            <a href="places_list.php?region=제주" class="feature-card">
                📍 지역별 여행지 보기
                <span>제주, 부산, 강릉 등 인기 명소 탐색</span>
            </a>
            <a href="checklist.php" class="feature-card">
                🧳 나의 여행 체크리스트
                <span>출발 전 준비물을 간편하게 정리하세요</span>
            </a>
            </div>
        </section>
    </section>
</body>
</html>
