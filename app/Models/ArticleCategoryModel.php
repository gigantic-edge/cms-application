<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleCategoryModel extends Model
{
    protected $table = 'article_category';
    public function subcategories()
    {
        return $this->hasMany(ArticleSubCategoryModel::class, 'category_id', 'id');
    }
}
