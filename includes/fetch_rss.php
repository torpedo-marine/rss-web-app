<?php
// ニュースサイトのRSSフィードURLリスト

foreach ($rssSources as $siteName => $url) {
    $rss = simplexml_load_file($url);
    if ($rss) {
        echo '<h2>' . htmlspecialchars($siteName) . '</h2>';
        echo '<div class="news-items-container">';
        $itemCount = 0;
        foreach ($rss->channel->item as $item) {
            if ($itemCount >= 6) {
                break;
            }
            $pubDate = strtotime($item->pubDate);
            $formattedDate = date('Y-m-d H:i:s', $pubDate);
            $dayOfWeek = date('l', $pubDate);

            $description = mb_substr($item->description, 0, 100);
            if (mb_strlen($item->description) > 100) {
                $description .= '...';
            }

            echo '<div class="news-item">';
            echo '<h3><a href="' . $item->link . '" target="_blank">' . htmlspecialchars($item->title) . '</a></h3>';
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