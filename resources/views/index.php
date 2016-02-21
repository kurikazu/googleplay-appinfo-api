<!doctype html>
<html class="no-js" lang="ja">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Google Play App Info API</title>
<link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-7907942-4', 'auto');
  ga('send', 'pageview');
</script>
</head>
<body>
<div class="callout large primary">
<div class="row column text-center">
<h1>Google Play App Info API</h1>
</div>
</div>
<div class="row medium-8 large-7 columns">
<div class="blog-post">
<p>Google Play のアプリ情報を取得するAPIを提供します。使い方は以下の通りです。</p>
<h3>Request</h3>
<p>以下のような形でコールしてください</p>
<p>http://googleplay.songs-inside.com/api/info?id=com.company.app&hl=ja</p>
<table>
  <thead>
    <tr>
      <th width="200">項目名</th>
      <th>説明</th>
      <th>省略</th>
      <th>例</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>id</td>
      <td>取得したいアプリのパッケージ名を指定します</td>
      <td>NO</td>
      <td>com.company.app</td>
    </tr>
    <tr>
      <td>hl</td>
      <td>取得したいStoreの国を指定します。省略した場合は ja になります</td>
      <td>YES</td>
      <td>ja</td>
    </tr>
  </tbody>
</table>

<h3>Response</h3>
<p>下記の値をjson形式で返却します。</p>
<table>
  <thead>
    <tr>
      <th width="200">項目名</th>
      <th>説明</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>count</td>
      <td>指定されたアプリが見つかれば1を、見つからなければ0を返します</td>
    </tr>
    <tr>
      <td>app_name</td>
      <td>アプリケーションのタイトルを返します</td>
    </tr>
    <tr>
      <td>description</td>
      <td>アプリの説明文を返します</td>
    </tr>
    <tr>
      <td>release_note</td>
      <td>新機能についての説明文を返します</td>
    </tr>
    <tr>
      <td>version</td>
      <td>現在のアプリのバージョンを返します</td>
    </tr>
    <tr>
      <td>score</td>
      <td>現在のアプリのレーティング値を返します</td>
    </tr>
  </tbody>
</table>
</div>
    <p>連絡先；<a href="https://twitter.com/kurikazu">@kurikazu</a></p>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
      $(document).foundation();
    </script>
</body>
</html>