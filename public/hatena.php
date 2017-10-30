<?php
$url = simplexml_load_file("http://chanchihiro.hatenablog.com/feed");
$num = 10;
$i=0;
$desW = 20;//詳細の文字数を制限します。制限しないときは0にします。
if ( $desW != 0){
    $desW = ($desW*2)+2;
}
foreach( $url->item as $item )
{
    if($i>=$num){
    }
    else{
    // 各エントリーの処理
    $title = $item->title ;  // タイトル
    $link = $item->link ;    // リンク
    $timestamp = strtotime( $item->children('http://purl.org/dc/elements/1.1/')->date) ;//更新日時
    $content = $item->children('http://purl.org/rss/1.0/modules/content/') ;// 詳細
    $data['content'] = $content;
    $item->thumbnail = trim($now_url,"/") . "./img/noimage.jpg";//画像がない場合の指定
    if( preg_match_all('/<img([\s\S]+?)>/is', $content, $matches) ){
        foreach( $matches[0] as $img ){
            if( preg_match('/src=[\'"](.+?jpe?g)[\'"]/', $img, $m) ){
                $item->thumbnail = $m[1];
            }
        }
    }
    $content =str_replace("▼続きを読む","",$content);//続きを読むなど、決まった文章が詳細にはいっている場合に、それを除外する
    $content  = strip_tags($content);
    if ( $desW != 0){
        $content = mb_strimwidth($content, 0, $desW, "…",'utf-8');
    }
     
    ?>
<p><?php echo date( "Y/m/d", $timestamp); ?></p>
<img src="<?php print $item->thumbnail; ?>" alt="<?php print $item->title; ?>" width="100">
<a href="<?php echo $link; ?>" target="_blank"><?php echo $title; ?></a>
<p class="text"><?php echo $content; ?></p>
    <?php
    $i++;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="connect">
    <meta name="author" content="野口千紘">
    <meta name="viewport" content="width=device-width, initial-scale=1,user-scalable=no">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="">
    <meta name="twitter:image" content="">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.png">
    <title>manna bakery</title>
  </head>
  <body onload="initialize();">
    <div id="manna_top_bg_gray"></div>
    <div id="manna_main">
      <header id="manna_header">
        <div id="title_logo"><a href="index.html"><img src="img/logo.png"></a></div>
        <div id="menu_list">
          <ul>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="news.html">NEWS</a></li>
            <li><a href="order.html">ORDER</a></li>
            <li><a href="blog.html">BLOG</a></li>
            <li><a href="contact.html">CONTACT</a></li>
          </ul>
        </div>
        <p id="info"></p>
      </header>
      <div id="manna_message"><img src="img/top_1.png" alt="breads">
        <div id="manna_text_message">
          <h2>美味しいグルテンフリーを世界の人々に</h2>
          <p>サンプルです。サンプルです。サンプルです。<br>サンプルです。サンプルです。サンプルです。サンプルです。サンプルです。<br>サンプルです。サンプルです。サンプルです。<br>サンプルです。サンプルです。サンプルです。サンプルです。</p><a href="about.html">see more...</a>
        </div>
      </div>
      <div id="manna_block_news" class="manna_block">
        <div class="title_heading">
          <h3>NEWS</h3>
        </div>
        <div id="manna_feed_news">
          <dl>
            <dt>2017.10.23</dt>
            <dd>お知らせ</dd>
            <dd>公式サイトをオープンしました。</dd>
          </dl>
          <dl>
            <dt>2017.10.22</dt>
            <dd>イベント</dd>
            <dd>南麻布にある公民館でグルテンフリーぱん作りのワークショップを開催します。</dd>
          </dl>
          <dl>
            <dt>2017.10.21</dt>
            <dd>メディア</dd>
            <dd>フジテレビ系列「とくダネ！」にて取り上げていただきました。</dd>
          </dl>
        </div><a href="news.html" class="manna_btn_seemore_right">see more ...</a>
      </div>
      <div id="manna_block_blog" class="manna_block">
        <div class="title_heading">
          <h3>BLOG</h3>
        </div>
        <div id="manna_feed_blog">
          <dl class="blog_first">
            <dt></dt>
            <dd class="copper">2017.10.10</dd>
            <dd class="title_blog">ついに自店舗を開店した話。</dd>
            <dd>サンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルですサンプルで</dd>
          </dl>
          <dl class="blog_sub">
            <dt></dt>
            <dd class="copper">2017.10.10</dd>
            <dd class="title_blog_sub">ついに自店舗を開店した話。</dd>
            <dd>サンプルですサンプルですサンプルですサンプルですサンプルですサンプルでサンプルですサンプル</dd>
          </dl>
          <hr>
          <dl class="blog_sub">
            <dt></dt>
            <dd class="copper">2017.10.10</dd>
            <dd class="title_blog_sub">ついに自店舗を開店した話。</dd>
            <dd>サンプルですサンプルですサンプルですサンプルですサンプルですサンプルですさんんぷr</dd>
          </dl>
          <hr>
          <dl class="blog_sub">
            <dt></dt>
            <dd class="copper">2017.10.10</dd>
            <dd class="title_blog_sub">ついに自店舗を開店した話。</dd>
            <dd>サンプルですサンプルですサンプルですサンプルですサンプルですサンプルで三rぷうサンプル</dd>
          </dl>
        </div><a href="blog.html" class="manna_btn_seemore_right">see more ...</a>
      </div>
      <div id="manna_block_order" class="manna_block">
        <div class="title_heading">
          <h3>ORDER</h3>
        </div>
        <div id="manna_feed_food">
          <dl>
            <dt class="order_1"></dt>
            <dd class="copper">ANN BREAD</dd>
            <dd>甘い柔らかなアンを包んだパンです。</dd>
          </dl>
          <dl>
            <dt class="order_2"></dt>
            <dd class="copper">ANN BREAD</dd>
            <dd>甘い柔らかなアンを包んだパンです。</dd>
          </dl>
          <dl>
            <dt class="order_3"></dt>
            <dd class="copper">ANN BREAD</dd>
            <dd>甘い柔らかなアンを包んだパンです。</dd>
          </dl>
          <dl>
            <dt class="order_4"></dt>
            <dd class="copper">ANN BREAD</dd>
            <dd>甘い柔らかなアンを包んだパンです。</dd>
          </dl>
          <dl>
            <dt class="order_5"></dt>
            <dd class="copper">ANN BREAD</dd>
            <dd>甘い柔らかなアンを包んだパンです。</dd>
          </dl>
          <dl>
            <dt class="order_6"></dt>
            <dd class="copper">ANN BREAD</dd>
            <dd>甘い柔らかなアンを包んだパンです。</dd>
          </dl>
        </div><a href="order.html" class="manna_btn_seemore_right">see more ...</a>
      </div>
    </div>
    <footer>
      <p>follow us</p>
      <div id="manna_sns"><a href=""><i class="fa fa-facebook fa-1x"></i></a><a href=""><i class="fa fa-twitter fa-1x"></i></a><a href="https://www.instagram.com/glunoble/"><i class="fa fa-instagram fa-1x"></i></a></div>
      <p><small>Copyright 2017 mannabakery All rights reserved.</small></p>
    </footer>
    <script src="https://sdk.form.run/js/v2/formrun.js"></script>
    <script src="js/bundle.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATwFstqlwJ9sa_ODgkj9pIXE-qAKTgoLM&amp;#038;callback=initMap"></script>
  </body>
</html>