<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ニュースRSSフィード収集アプリ</title>
    <link rel="stylesheet" href="css/santize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Poiret+One&family=Sawarabi+Mincho&family=Zen+Kurenaido&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Sawarabi+Mincho&family=Zen+Kurenaido&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="datetime">
        <div class="date" id="date"></div>
        <div class="time" id="time"></div>
    </div>

    <ul id="nav">
        <li><a href="index.php">ホーム</a></li>
        <li><a href="technology.php">テクノロジー</a></li>
    </ul>

    <!-- 外部JavaScriptファイルを読み込む -->
    <script src="script.js"></script>

        <h1>news topic</h1>
        <?php
// ニュースのRSSフィードリスト
$rssSources = [
    'ナゾロジー' =>'https://nazology.kusuguru.co.jp/feed',
];

include 'includes/fetch_rss.php';
?>

    </div>
</body>
</html>
