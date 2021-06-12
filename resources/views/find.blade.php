<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>商品検索結果画面</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>

<body>
    <header>
        @include('header')
    </header>
    <br>
    @if(isset($item))
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <h2>商品一覧</h2>
            @if (session('err_msg'))
            <p class="text-danger">
                {{ session('err_msg') }}
            </p>
            @endif
            <table class="table table-striped">
                <tr>
                    <th>id</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>メーカー名</th>
                    <th></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $item->getId }}</td>
                    <td><img src="{{ asset('storage/' . $product['product_image']) }}" width="30" height="100"></td>
                    <td><a href="/home/{{ $product->id }}">{{ $item->getProduct_name }}</a></td>
                    <td>{{ $item->getPrice }}</td>
                    <td>{{ $item->getStock }}</td>
                    <td>{{ $item->getComment }}</td>
                    <form method="POST" action="{{ route('delete', $product->id) }}" onSubmit="return checkDelete()">
                        @csrf
                        <th><button type="submit" class="btn btn-primary" onclick=>削除</button></th>
                    </form>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <footer class="footer bg-dark  fixed-bottom">
        @include('footer')
    </footer>
</body>

</html>