<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    //
    protected $table    = "articles";
    protected $fillable = [
        'category_id',
        'subcategory_id',
        'name',
        'author',
        'slug',
        'short_description',
        'description',
        'featured_image',
        'ranking',
        'is_featured_article',
    ];
}
