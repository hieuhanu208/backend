<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table      = "news";

    protected $primaryKey = 'news_id';

    protected $fillable   = ['content', 'email', 'user_id', 'header', 'short_description', 'news_img'];

    public $timestamps = false;
}
