<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //テーブル名
    protected $table = 'sales';

    protected $fillable =
    [
        'product_id'
    ];

    public function products()
    {
    return $this->belongsTo(Product::class);
    }
}
