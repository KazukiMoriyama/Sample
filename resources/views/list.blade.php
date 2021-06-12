<h2>検索フォーム</h2>
<form action="{{ route('find') }}" method="get">
    <input type="text" name="product_name" value="" placeholder="商品名を入力してください">
    <select name="company_id" value="{{ old('company_id') }}">
        <option disabled selected value>メーカーを選択してください</option>
        @foreach($companies as $company)
        <option value="{{$company->id}}">{{$company->company_name}}</option>
        @endforeach
    </select>
    <input type="submit" value="検索">
</form>
<br>
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
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset('storage/' . $product['product_image']) }}" width="30" height="100"></td>
                <td><a href="/home/{{ $product->id }}">{{ $product->product_name }}</a></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->company->company_name }}</td>
                <form method="POST" action="{{ route('delete', $product->id) }}" onSubmit="return checkDelete()">
                    @csrf
                    <th><button type="submit" class="btn btn-primary" onclick=>削除</button></th>
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script>
function checkDelete() {
    if (window.confirm('削除してよろしいですか？')) {
        return true;
    } else {
        return false;
    }
}
</script>