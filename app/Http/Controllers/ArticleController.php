<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategoryModel;
use App\Models\ArticleModel;
use App\Models\ArticleSubCategoryModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mews\Purifier\Facades\Purifier;


class ArticleController extends Controller
{
    // Article Category
    public function articleCategory()
    {
        $data['categories'] = ArticleCategoryModel::where('is_deleted', '=', '0')->orderBy("id", 'DESC')->paginate(10);
        $title              = 'Article Category';
        $page_name          = 'admin.module.article-category.article-category';
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function addArticleCategory(Request $request)
    {
        $data                   = [];
        $title                  = 'Add Article Category';
        $page_name              = 'admin.module.article-category.add-article-category';
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name'      => 'required|string|max:100',
                'order'     => 'required|numeric',
                'status'    => 'required',
            ]);
            $postedData = [
                'name'      => $validatedData['name'],
                'ranking'   => $validatedData['order'],
                'status'    => $validatedData['status']
            ];
            ArticleCategoryModel::insert($postedData);
            return redirect('/Administrator/article-categories')->with([
                'message'   => 'Category Successfully Inserted !!.',
                'type'      => 'success',
            ]);
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function editArticleCategory(Request $request, $id)
    {
        $data                   = [];
        $title                  = 'Edit Article Category';
        $page_name              = 'admin.module.article-category.edit-article-category';
        $data['category']       = ArticleCategoryModel::where('is_deleted', '=', '0')->where('id', '=', $id)->first();
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name'      => 'required|string|max:100',
                'order'     => 'required|numeric',
                'status'    => 'required',
            ]);
            $postedData = [
                'name'      => $validatedData['name'],
                'ranking'   => $validatedData['order'],
                'status'    => $validatedData['status']
            ];
            ArticleCategoryModel::where('id', '=', $id)->update($postedData);
            return redirect('/Administrator/article-categories')->with([
                'message' => 'Category Successfully Updated !!.',
                'type'    => 'success',
            ]);
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function deleteArticleCategory($id)
    {
        $postedData     = [
            'is_deleted' => '1',
        ];
        ArticleCategoryModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Category Successfully Deleted !!.',
            'type'    => 'success',
        ]);
    }
    public function articleCategoryActive($id)
    {
        $postedData     = [
            'status' => 'active',
        ];
        ArticleCategoryModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Category Successfully Deactivated !!.',
            'type'    => 'success',
        ]);
    }
    public function articleCategoryInActive($id)
    {
        $postedData     = [
            'status' => 'inactive',
        ];
        ArticleCategoryModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Category Successfully Activated !!.',
            'type'    => 'success',
        ]);
    }
    // Article Category

    // Article Sub-Category
    public function articleSubCategory()
    {
        $data['categories'] = ArticleSubCategoryModel::leftJoin('article_category', 'article_sub_category.category_id', '=', 'article_category.id')
            ->select('article_sub_category.*', 'article_category.name as category_name')
            ->where('article_sub_category.is_deleted', '0')
            ->orderBy('article_sub_category.id', 'DESC')
            ->paginate(10);
        $title              = 'Article Sub-Category';
        $page_name          = 'admin.module.article-sub-category.article-sub-category';
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function addArticleSubCategory(Request $request)
    {
        $data['categories']     = ArticleCategoryModel::where('is_deleted', '=', '0')->where('status', '=', 'active')->orderBy("ranking", 'ASC')->get();
        $title                  = 'Add Article Sub-Category';
        $page_name              = 'admin.module.article-sub-category.add-article-sub-category';
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'parent_category' => 'required',
                'name'            => 'required|string|max:100',
                'order'           => 'required|numeric',
                'status'          => 'required',
            ]);
            $postedData = [
                'category_id'     => $validatedData['parent_category'],
                'name'            => $validatedData['name'],
                'ranking'         => $validatedData['order'],
                'status'          => $validatedData['status']
            ];
            ArticleSubCategoryModel::insert($postedData);
            return redirect('/Administrator/article-sub-categories')->with([
                'message'   => 'Sub-Category Successfully Inserted !!.',
                'type'      => 'success',
            ]);
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function editArticleSubCategory(Request $request, $id)
    {
        $data                   = [];
        $title                  = 'Edit Article Sub-Category';
        $page_name              = 'admin.module.article-sub-category.edit-article-sub-category';
        $data['categories']     = ArticleCategoryModel::where('is_deleted', '=', '0')->where('status', '=', 'active')->orderBy("ranking", 'ASC')->get();
        $data['sub_category']   = ArticleSubCategoryModel::where('is_deleted', '=', '0')->where('id', '=', $id)->first();
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'parent_category'   => 'required',
                'name'              => 'required|string|max:100',
                'order'             => 'required|numeric',
                'status'            => 'required',
            ]);
            $postedData = [
                'category_id'       => $validatedData['parent_category'],
                'name'              => $validatedData['name'],
                'ranking'           => $validatedData['order'],
                'status'            => $validatedData['status']
            ];
            ArticleSubCategoryModel::where('id', '=', $id)->update($postedData);
            return redirect('/Administrator/article-sub-categories')->with([
                'message' => 'Sub-Category Successfully Updated !!.',
                'type'    => 'success',
            ]);
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function deleteArticleSubCategory($id)
    {
        $postedData     = [
            'is_deleted' => '1',
        ];
        ArticleSubCategoryModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Sub-Category Successfully Deleted !!.',
            'type'    => 'success',
        ]);
    }
    public function articleSubCategoryActive($id)
    {
        $postedData     = [
            'status' => 'active',
        ];
        ArticleSubCategoryModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Sub-Category Successfully Deactivated !!.',
            'type'    => 'success',
        ]);
    }
    public function articleSubCategoryInActive($id)
    {
        $postedData     = [
            'status' => 'inactive',
        ];
        ArticleSubCategoryModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Sub-Category Successfully Activated !!.',
            'type'    => 'success',
        ]);
    }
    // Article Sub-Category

    // Article
    public function articles()
    {
        $data['user_type']  = session('user_type');
        $data['articles']   = ArticleModel::leftJoin('article_category', 'articles.category_id', '=', 'article_category.id')
            ->leftJoin('article_sub_category', 'articles.subcategory_id', '=', 'article_sub_category.id')
            ->select('articles.*', 'article_category.name as category_name', 'article_sub_category.name as sub_category_name')
            ->where('articles.is_deleted', '0')
            ->orderBy('articles.id', 'DESC')
            ->paginate(10);
        $title              = 'Articles';
        $page_name          = 'admin.module.article.articles';
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function addArticle(Request $request)
    {
        $data['categories'] = ArticleCategoryModel::where('is_deleted', '=', '0')->where('status', '=', 'active')->orderBy("ranking", 'ASC')->get();
        $title              = 'Add Articles';
        $page_name          = 'admin.module.article.add-articles';
        if ($request->isMethod('post')) {
            $validatedData  = $request->validate([
                'parent_category'   => 'required',
                'subcategory'       => 'required',
                'name'              => 'required|string|max:200',
                'author'            => 'required|string|max:200',
                'short_description' => 'required',
                'description'       => 'required',
                'featured_image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_featured'       => 'required',
                'order'             => 'required|numeric',
            ]);
            if ($validatedData) {

                /**image upload */
                $file           = $request->file('featured_image');
                $originalName   = $file->getClientOriginalName();
                $fileName       = time() . '_' . $originalName;
                $path           = 'images/articles';
                $file->storeAs($path, $fileName, 'public');
                /**image upload */

                $postedData = [
                    'category_id'           => $validatedData['parent_category'],
                    'subcategory_id'        => $validatedData['subcategory'],
                    'name'                  => $validatedData['name'],
                    'author'                => $validatedData['author'],
                    'slug'                  => Str::slug($validatedData['name']),
                    'short_description'     => Purifier::clean($validatedData['short_description']),
                    'description'           => Purifier::clean($validatedData['description']),
                    'featured_image'        => $fileName,
                    'ranking'               => $validatedData['order'],
                    'is_featured_article'   => $validatedData['is_featured'],
                ];
                if (ArticleModel::insert($postedData)) {
                    return redirect('/Administrator/articles')->with([
                        'message' => 'Article Successfully Inserted !!.',
                        'type'    => 'success',
                    ]);
                } else {
                    return redirect('/Administrator/articles')->with([
                        'message' => 'Article is not inserted !!.',
                        'type'    => 'error',
                    ]);
                }
            }
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function getSubcategories(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
        ]);
        $subcategoriesData  = ArticleSubCategoryModel::where('category_id', $request->category_id)->where('status','=','active')->get();
        $subcategories      = $subcategoriesData->pluck('name', 'id');
        return response()->json($subcategories);
    }
    public function editArticle(Request $request, $id)
    {
        $data['categories']         = ArticleCategoryModel::where('is_deleted', '=', '0')
        ->where('status', '=', 'active')
            ->orderBy("ranking", 'ASC')
            ->get();
            
            $article                    = ArticleModel::findOrFail($id);
            $data['article']            = $article;
            $data['subcategories']      = ArticleSubCategoryModel::where('id', '=', $article->subcategory_id)->get();
            
            if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'parent_category'   => 'required',
                'subcategory'       => 'required',
                'name'              => 'required|string|max:200',
                'author'            => 'required|string|max:200',
                'description'       => 'required',
                'short_description' => 'required',
                'featured_image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'is_featured'       => 'required|boolean',
                'order'             => 'required|numeric',
            ]);

            $postedData = [
                'category_id'           => $validatedData['parent_category'],
                'subcategory_id'        => $validatedData['subcategory'],
                'name'                  => $validatedData['name'],
                'author'                => $validatedData['author'],
                'slug'                  => Str::slug($validatedData['name']),
                'description'           => $validatedData['description'],
                'short_description'     => $validatedData['short_description'],
                'ranking'               => $validatedData['order'],
                'is_featured_article'   => $validatedData['is_featured'],
            ];

            if ($request->hasFile('featured_image')) {
                if ($article->featured_image && file_exists(public_path('storage/images/articles/' . $article->featured_image))) {
                    unlink(public_path('storage/images/articles/' . $article->featured_image));
                }
                $file       = $request->file('featured_image');
                $fileName   = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('images/articles', $fileName, 'public');
                $postedData['featured_image'] = $fileName;
            }
            $updateResult = $article->update($postedData);
            if ($updateResult) {
                return redirect('/Administrator/articles')->with([
                    'message' => 'Article Successfully Updated!',
                    'type'    => 'success',
                ]);
            } else {
                return redirect('/Administrator/articles')->with([
                    'message' => 'Failed to update the article.',
                    'type'    => 'error',
                ]);
            }
        }
        $title      = 'Edit Articles';
        $page_name  = 'admin.module.article.edit-article';
        return $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function deleteArticle($id)
    {
        $postedData     = [
            'is_deleted' => '1',
        ];
        ArticleModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Article Successfully Deleted !!.',
            'type'    => 'success',
        ]);
    }
    public function articleActive($id)
    {
        $postedData     = [
            'status' => 'active',
        ];
        ArticleModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Article Successfully Activated !!.',
            'type'    => 'success',
        ]);
    }
    public function articleInActive($id)
    {
        $postedData     = [
            'status' => 'inactive',
        ];
        ArticleModel::where('id', '=', $id)->update($postedData);
        return redirect()->back()->with([
            'message' => 'Article Successfully Dectivated !!.',
            'type'    => 'success',
        ]);
    }
    // Article
}
