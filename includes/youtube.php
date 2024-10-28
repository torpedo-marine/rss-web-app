<?php
// ニュースサイトのRSSフィードURLリスト
$rssSources = [
    'ナナホシ管弦楽団' =>'https://www.youtube.com/feeds/videos.xml?channel_id=UCh_vIwOvAvBshqSgvD3G0YA',
];

foreach ($rssSources as $siteName => $url) {
    $rss = simplexml_load_file($url);
    if ($rss) {
        echo '<h2>' . htmlspecialchars($siteName) . '</h2>';
        echo '<div class="news-items-container">';
        // カウンタを使って表示するアイテム数を制限
        $itemCount = 0;
        foreach ($rss->entry as $item) {
            if ($itemCount >= 3) {
                break; // 3件表示したらループを終了
            }
            $pubDate = strtotime($item->published);
            $formattedDate = date('Y-m-d H:i:s', $pubDate); // 24時間表記の時刻と日付
            $dayOfWeek = date('l', $pubDate); // 曜日を取得

            // YouTube用のリンクとタイトル取得
            $title = $item->title;
            $link = $item->link['href'];

            // YouTubeの動画の概要を短くする
            $description = mb_substr($item->summary, 0, 100);
            if (mb_strlen($item->summary) > 100) {
                $description .= '...';
            }

            echo '<div class="news-item">';
            echo '<h3><a href="' . $link . '" target="_blank">' . htmlspecialchars($title) . '</a></h3>';
            echo '<p>' . htmlspecialchars($description) . '</p>';
            echo '<p><small>' . $formattedDate . ' (' . $dayOfWeek . ')</small></p>';
            echo '</div>';
            $itemCount++;
        }
        echo '</div>';
    } else {
        echo '<p>RSSフィードの読み込みに失敗しました: ' . htmlspecialchars($url) . '</p>';
    }
}
?>