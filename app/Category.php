<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "category";

    protected $fillable = ['cate_id','cate_name','cate_slug'];

    public $timestamps = false;
}
