<?php

namespace App\Http\Controllers;

use App\Models\ArticleCategoryModel;
use App\Models\ArticleModel;
use App\Models\ArticleSubCategoryModel;
use App\Models\CommentModel;
use App\Models\User;

abstract class Controller
{
    //
    public function admin_after_login_layout($title, $page_name, $data)
    {
        $data['title']              = $title . '::' . 'CMS';
        $data['page_header']        = $title;
        $user_id                    = session('user_id');
        $data['userDetails']        = User::where('id', '=', $user_id)->first();
        $data['catCount']           = ArticleCategoryModel::where('is_deleted', '=', '0')->where('status', '=', 'active')->count();
        $data['subCatCount']        = ArticleSubCategoryModel::where('is_deleted', '=', '0')->where('status', '=', 'active')->count();
        $data['articleCount']       = ArticleModel::where('is_deleted', '=', '0')->where('status', '=', 'active')->count();
        $data['commentCount']       = CommentModel::where('is_deleted', '=', '0')->count();
        $data['head']               = view('admin.layout.head', $data);
        $data['header']             = view('admin.layout.header', $data);
        $data['footer']             = view('admin.layout.footer', $data);
        $data['sidebar']            = view('admin.layout.sidebar', $data);
        $data['maincontent']        = view($page_name, $data);
        return view('admin.layout.admin_template', $data);
    }
    public function frontend_layout($title, $page_name, $data)
    {
        $data['title']              = $title;
        $data['head']               = view('frontend.layout.head', $data);
        $data['categories']         = ArticleCategoryModel::where('is_deleted', '0')
            ->with(['subcategories' => function ($query) {
                $query->where('status', 'active');
            }])
            ->get();
        $data['footer']             = view('frontend.layout.footer', $data);
        $data['navbar']             = view('frontend.layout.navbar', $data);
        $data['maincontent']        = view($page_name, $data);
        return view('frontend.layout.frontend_template', $data);
    }
}
