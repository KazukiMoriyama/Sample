<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;


class HomeController extends Controller
{
    /**
     * 商品一覧を表示する
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $companies = Company::all();

        return view('home',['products' => $products],['companies' => $companies]);
    }

    /**
     * 商品詳細を表示する
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showDetail($id)
    {
        $products = Product::find($id);

        if(is_null($products)) {
            \Session::flash('err_msg','データがありません');
            return redirect(route('home'));
        }

        return view('detail',
        ['products' => $products]);
    }

    /**
     * 商品登録画面を表示する
     *
     * @return view
     */
    public function showCreate()
    {
        $companies = Company::all();
        return view('form',['companies' => $companies ]);
    }

    /**
     * 商品登録をする
     *
     * @return view
     */
    public function exeStore(ProductRequest $request)
    {
    // もし画像があれば
    if($file = $request->product_image) {
    // ファイル名をアップロードした元ファイル名で生成
    $fileName = $file->getClientOriginalName();
    // storage内のapp/publicファイルに保存
    $target_path = storage_path('app/public/');
    // public/uploads/に$fileNameで挿入
    $file->move($target_path, $fileName);

    }else{
    // 画像がない場合は空
    $fileName = "";
    }

    $product_name = $request->product_name;
    $company_id = $request->company_id;
    $price = $request->price;
    $stock = $request->stock;
    $comment = $request->comment;

    \DB::beginTransaction();
    try {
        Product::create([
            "product_name" => $product_name,
            "company_id" => $company_id,
            "product_image" => $fileName,
            "price" => $price,
            "stock" => $stock,
            "comment" => $comment
            ]);
        \DB::commit();
    } catch(\Throwable $e) {
        \DB::rollback();
        abort(500);
    }

    \Session::flash('err_msg','商品を登録しました。');
        return redirect(route('home'));
    }

    /**
     * 商品編集フォームを表示する
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showEdit($id)
    {
        $products = Product::find($id);
        $companies = company::all();
        if(is_null($products)) {
            \Session::flash('err_msg','データがありません');
            return redirect(route('home'));
        }
        return view('edit',['products' => $products],['companies' => $companies]);
    }

    /**
     * 商品を編集する
     *
     * @return view
     */
    public function exeUpdate(ProductRequest $request)
    {
    if($file = $request->product_image) {
        // ファイル名をアップロードした元ファイル名で生成
        $fileName = $file->getClientOriginalName();
        // storage内のapp/publicファイルに保存
        $target_path = storage_path('app/public/');
        // public/uploads/に$fileNameで挿入
        $file->move($target_path, $fileName);
        }else{
        // 画像がない場合は空
        $fileName = "";
        }

        $id = $request->id;
        $product_name = $request->product_name;
        $company_id = $request->company_id;
        $price = $request->price;
        $stock = $request->stock;
        $comment = $request->comment;

    \DB::beginTransaction();
    try {
        $products = Product::find($id);
        $products->fill([
            "product_name" => $product_name,
            "company_id" => $company_id,
            "product_image" => $fileName,
            "price" => $price,
            "stock" => $stock,
            "comment" => $comment
        ]);

        $products->save();
        \DB::commit();
    } catch(\Throwable $e) {
        \DB::rollback();
        abort(500);
    }
    \Session::flash('err_msg','商品を更新しました。');
        return redirect(route('home'),);
    }

    /**
     * 商品を削除
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exeDelete($id)
    {
        if(empty($id)) {
            \Session::flash('err_msg','データがありません');
            return redirect(route('home'));
        }
        try {
            Product::destroy($id);
            } catch(\Throwable $e) {
                abort(500);
            }

            \Session::flash('err_msg','削除しました。');
            return redirect(route('home'));
    }

    /**
     * 商品を検索する
     *
     * @return view
     */
    public function find(Request $request)
    {
        $products = Product::orderBy('created_at','desc');
        $companies = Company::all();

        $product_name = $request->product_name;
        $company = $request->company_id;

        if($product_name != ''){
            $products->where('product_name','like','%'.$product_name.'%');
        }

        if($company != ''){
            $products->where('company_id','like','%'.$company.'%');
        }

        $res = $products->paginate();

        return view('home',['products' => $res],['companies' => $companies ]);
        }

    }

