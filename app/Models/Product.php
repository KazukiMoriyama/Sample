<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //テーブル名
    protected $table = 'products';

    //可変項目
    protected $fillable =
    [
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'product_image',
    ];

    public function company()
    {
    return $this->belongsTo(Company::class);
    }

    public function sales()
    {
    return $this->hasMany(Sales::class);
    }
}
