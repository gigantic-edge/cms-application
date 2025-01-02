<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('frontend.home');
// });

Route::get('/',[frontendController::class,'home']);
Route::match(['get','post'],'/article/{id}',[frontendController::class,'article']);
Route::match(['get','post'],'/article-details/{slug}',[frontendController::class,'articleDetails']);
Route::get('/articles/search', [frontendController::class, 'search']);
Route::match(['get','post'],'/signup',[frontendController::class,'signup']);
Route::match(['get','post'],'/login',[frontendController::class,'login']);
Route::get('/logout',[frontendController::class,'logout']);

Route::prefix('Administrator/')->group(function(){
    Route::match(['get','post'],'/',[UserController::class,'index']);
        Route::middleware('admin')->group(function(){
            Route::match(['get','post'],'/dashboard',[UserController::class,'dashboard']);
            Route::match(['get','post'],'/profile',[UserController::class,'profile']);
            Route::get('/logout',[UserController::class,'logout']);
            /**Article Category */
            Route::match(['get','post'],'/article-categories',[ArticleController::class,'articleCategory']);
            Route::match(['get','post'],'/add-article-category',[ArticleController::class,'addArticleCategory']);
            Route::match(['get','post'],'/edit-article-category/{id}',[ArticleController::class,'editArticleCategory']);
            Route::match(['get','post'],'/delete-article-category/{id}',[ArticleController::class,'deleteArticleCategory']);
            Route::match(['get','post'],'/article_category_active/{id}',[ArticleController::class,'articleCategoryActive']);
            Route::match(['get','post'],'/article_category_inactive/{id}',[ArticleController::class,'articleCategoryInActive']);
            /**Article Category */
            /**Article Sub-Category */
            Route::match(['get','post'],'/article-sub-categories',[ArticleController::class,'articleSubCategory']);
            Route::match(['get','post'],'/add-article-sub-category',[ArticleController::class,'addArticleSubCategory']);
            Route::match(['get','post'],'/edit-article-sub-category/{id}',[ArticleController::class,'editArticleSubCategory']);
            Route::match(['get','post'],'/delete-article-sub-category/{id}',[ArticleController::class,'deleteArticleSubCategory']);
            Route::match(['get','post'],'/article_sub_category_active/{id}',[ArticleController::class,'articleSubCategoryActive']);
            Route::match(['get','post'],'/article_sub_category_inactive/{id}',[ArticleController::class,'articleSubCategoryInActive']);
            /**Article Sub-Category */
            /**Article */
            Route::match(['get','post'],'/articles',[ArticleController::class,'articles']);
            Route::match(['get','post'],'/add-article',[ArticleController::class,'addArticle']);
            Route::match(['get','post'],'/get-subcategories',[ArticleController::class,'getSubcategories']);
            Route::match(['get','post'],'/edit-article/{id}',[ArticleController::class,'editArticle']);
            Route::match(['get','post'],'/delete-article/{id}',[ArticleController::class,'deleteArticle']);
            Route::match(['get','post'],'/article_active/{id}',[ArticleController::class,'articleActive']);
            Route::match(['get','post'],'/article_inactive/{id}',[ArticleController::class,'articleInActive']);
            /**Article */
            /**comments */
            Route::match(['get','post'],'/comments',[CommentsController::class,'comments']);
            Route::match(['get','post'],'/update_comment_status',[CommentsController::class,'updateCommentStatus']);
            Route::match(['get','post'],'/delete_comment',[CommentsController::class,'deleteComment']);
            /**comments */
            /**Users */
            Route::match(['get','post'],'/users',[UserController::class,'users']);
            Route::match(['get','post'],'/update_user_status',[UserController::class,'updateUserStatus']);
            Route::match(['get','post'],'/updateUserRole/{id}',[UserController::class,'updateUserRole']);
            /**Users */
        });
});
