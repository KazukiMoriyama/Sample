<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品情報詳細画面</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>

<body>
    <header>
        @include('header')
    </header>
    <br>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>商品画像</th>
                <th>商品名</th>
                <th>メーカー</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>コメント</th>
                <th><button type="button" class="btn btn-primary"
                        onclick="location.href='/home/edit/{{ $products->id }}'">編集</button></th>
                <th><button type="button" class="btn btn-primary" onclick="location.href='/home'">戻る</button></th>
            </tr>
            <tr>
                <td>{{ $products->id }}</td>
                <td><img src="{{ asset('storage/' . $products['product_image']) }}" width="30" height="100"></td>
                <td>{{ $products->product_name }}</td>
                <td>{{ $products->company->company_name }}</td>
                <td>{{ $products->price }}</td>
                <td>{{ $products->stock }}</td>
                <td>{{ $products->comment }}</td>
                <td></td>
            </tr>
        </table>
    </div>
    <footer class="footer bg-dark  fixed-bottom">
        @include('footer')
    </footer>
</body>

</html>