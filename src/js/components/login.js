import $ from 'jquery';

jQuery(function ($) {
    var $feedElement = $('#feed'),
        feedUrl = $feedElement.data('feedUrl'),
        feedCount = $feedElement.data('feedCount');
 
    // フィードの取得
    $.ajax('../rss.php', {
        type: 'POST',
        dataType : 'json',
        async: true,
        processData: true,
        timeout: 10000,
        data: {url: feedUrl}
    })
    .done(function (data) {
        var html = '';
        // 取得した投稿データごとに繰り返す
        for (var i = 0; i < data.length; i++) {
            var entry = data[i];
            console.log(entry);
            // 投稿日
            var pubDate = new Date(entry.published);
            html += '<dt>' + pubDate.getFullYear() + '/' + ('0' + (pubDate.getMonth() + 1)).slice(-2) + '/' + ('0' + pubDate.getDate()).slice(-2) + '</dt>';
 
            // タイトル、リンク
            html += '<dd><a href="' + entry.link + '">' + entry.title + '</a></dd>';

            // 文章
            html += '<dd>' + entry.summary + '</dd>';
 
            if (!(--feedCount)) {
                break;
            }
        }
        $feedElement.html(html);
    });
});