function updateDateTime() {
    const dateElement = document.getElementById('date');
    const timeElement = document.getElementById('time');

    const now = new Date();
    const year = now.getFullYear();
    const month = now.getMonth() + 1;
    const day = now.getDate();

    const weekdayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    const weekday = weekdayNames[now.getDay()];

    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');

    dateElement.textContent = `${year} / ${month} / ${day} (${weekday})`;
    timeElement.textContent = `${hours}:${minutes}`;
}

// 1秒ごとに時間を更新
setInterval(updateDateTime, 1000);

// ページが読み込まれたらすぐに日時を表示
updateDateTime();
