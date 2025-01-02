<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleSubCategoryModel extends Model
{
    //
    protected $table = 'article_sub_category';
    protected $fillable = ['category_id', 'name'];
}
