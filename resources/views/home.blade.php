<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品情報一覧画面</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>

<body>
    <header>
        @include('header')
    </header>
    <br>
    <div class="container">
        @include('list')
    </div>
    <footer class="footer bg-dark  fixed-bottom">
        @include('footer')
    </footer>
</body>

</html>