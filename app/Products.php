<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $table = "products";

    protected $fillable = ['name', 'cate_id', 'description', 'unit_price', 'promotion_price', '	image', 'top_product', 'new'  ];

    public $timestamps = true;
}
