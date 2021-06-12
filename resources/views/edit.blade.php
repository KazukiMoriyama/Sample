<!DOCTYPE HTML>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <title>商品編集画面</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" defer></script>
</head>

<body>
    <header>
        @include('header')
    </header>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>商品編集フォーム</h2>
                <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $products->id }}">
                    <div class="form-group">
                        <label for="product_name">
                            商品名
                        </label>
                        <input id="product_name" name="product_name" class="form-control"
                            value="{{ $products->product_name }}" type="text">
                        @if ($errors->has('product_name'))
                        <div class="text-danger">
                            {{ $errors->first('product_name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="product_name">
                            メーカー名
                        </label>
                        <select name="company_id" class="form-control" value="{{ old('company_name') }}">
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('company_name'))
                        <div class="text-danger">
                            {{ $errors->first('company_name') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">
                            値段
                        </label>
                        <input id="price" name="price" class="form-control" value="{{ $products->price }}" type="text">
                        @if ($errors->has('price'))
                        <div class="text-danger">
                            {{ $errors->first('price') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="stock">
                            在庫数
                        </label>
                        <input id="stock" name="stock" class="form-control" value="{{ $products->stock }}" type="text">
                        @if ($errors->has('stock'))
                        <div class="text-danger">
                            {{ $errors->first('stock') }}
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="comment">
                            コメント
                        </label>
                        <textarea id="comment" name="comment" class="form-control"
                            rows="4">{{ $products->comment }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_image">
                            商品画像
                        </label>
                        <br>
                        <td><img src="{{ asset('storage/' . $products['product_image']) }}" width="30" height="100">
                        </td>
                        <input id="product_image" type="file" name="product_image"
                            value="{{ $products->product_image }}">
                        <br>
                    </div>
                    <div class="mt-5">
                        <button type="button" class="btn btn-primary"
                            onclick="location.href='/home/{{ $products->id }}'">
                            戻る
                        </button>
                        <button type="submit" class="btn btn-primary">
                            更新する
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <script>
        function checkSubmit() {
            if (window.confirm('更新してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
        </script>
        <br>
    </div>

    <footer class="footer bg-dark  fixed-bottom">
        @include('footer')
    </footer>
</body>

</html>