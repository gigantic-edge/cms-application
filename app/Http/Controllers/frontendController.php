<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\ArticleSubCategoryModel;
use App\Models\CommentModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class frontendController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'email'                 => 'required|email',
                'password'              => 'required|string',
            ], [
                'email.required'        => 'We need your email address to proceed.',
                'email.email'           => 'Make sure to enter a valid email address.',
                'password.required'     => 'A password is necessary for your account.',
            ]);
            if (Auth::guard('web')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
                $sessionData = Auth::guard('web')->user();
                if ($sessionData->is_approved != 1) {
                    return redirect()->back()->with([
                        'message' => 'Your request is not approved by our Administrator. Please wait or contact the Administrator.',
                        'type'    => 'warning',
                    ]);
                }
                $request->session()->put('user_id', $sessionData->id);
                $request->session()->put('name', $sessionData->name);
                $request->session()->put('email', $sessionData->email);
                $request->session()->put('user_type', $sessionData->role);
                $request->session()->put('is_user_login', 1);
                return redirect('')->with([
                    'message' => 'Logged in successfully.',
                    'type'    => 'success',
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'You have entered an invalid email or password.',
                    'type'    => 'error',
                ]);
            }
        }
        $data['is_loggedin']        = session('is_user_login');
        $title                      = 'ArticleHub';
        $page_name                  = 'frontend.login';
        echo $this->frontend_layout($title, $page_name, $data);
    }
    public function logout()
    {
        session()->forget(['user_id', 'name', 'email', 'user_type', 'is_user_login']);
        Auth::guard('web')->logout();
        return redirect('/')->with([
            'message' => 'You are logged out from our system!!!.',
            'type'    => 'success',
        ]);
    }
    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name'              => 'required|string|max:100',
                'email'             => 'required|email',
                'mobile'            => 'required|string|max:10',
                'password'          => 'required|min:6',
                'confirm-password'  => 'required|same:password',
                'terms'             => 'accepted',
            ], [
                'name.required'         => 'Please enter your name.',
                'name.string'           => 'Your name must be a valid text.',
                'name.max'              => 'Your name can have a maximum of 255 characters.',

                'email.required'        => 'We need your email address to proceed.',
                'email.email'           => 'Make sure to enter a valid email address.',

                'mobile.required'       => 'Your mobile number is required.',
                'mobile.string'         => 'Mobile number must be in text format.',
                'mobile.max'            => 'Mobile number cannot exceed 10 characters.',

                'password.required'     => 'A password is necessary for your account.',
                'password.min'          => 'Your password must have at least 6 characters.',

                'confirm-password.required' => 'Please confirm your password.',
                'confirm-password.same'     => 'The confirmation password does not match.',

                'terms.accepted'            => 'You must accept the Terms and Conditions to proceed.',
            ]);
            $valid_user = User::where('email', $validatedData['email'])->orWhere('mobile', $validatedData['mobile'])->first();

            if ($valid_user) {
                return redirect()->back()->with([
                    'message' => 'A user with this email or mobile number already exists!',
                    'type'    => 'error',
                ]);
            } else {
                if ($validatedData['password'] == $validatedData['confirm-password']) {
                    User::create([
                        'name'     => $validatedData['name'],
                        'email'    => $validatedData['email'],
                        'mobile'   => $validatedData['mobile'],
                        'password' => Hash::make($validatedData['password']),
                    ]);
                    return redirect()->back()->with([
                        'message' => 'Request sent to our admin, please wait for approval.',
                        'type'    => 'warning',
                    ]);
                } else {
                    return redirect()->back()->with([
                        'message' => 'Password does not match !',
                        'type'    => 'error',
                    ]);
                }
            }
        }
        return view('frontend.signup');
    }
    public function home()
    {
        $data['latest_articles'] = ArticleModel::where('is_deleted', '=', '0')->where('is_featured_article', '=', '1')->where('status', '=', 'active')->orderBy("id", 'DESC')->limit(6)->get()->toArray();
        shuffle($data['latest_articles']);
        $data['latest_articles'] = collect($data['latest_articles']);
        $title                   = 'ArticleHub';
        $page_name               = 'frontend.home';
        echo $this->frontend_layout($title, $page_name, $data);
    }
    public function article($id)
    {
        $id                      = base64_decode($id);
        $data['sub_cat_name']    = ArticleSubCategoryModel::findOrFail($id);
        $data['articles']        = ArticleModel::where('subcategory_id', '=', $id)->where('is_deleted', '=', '0')->where('status', '=', 'active')->orderBy("id", 'DESC')->paginate(6);
        $title                   = 'ArticleHub';
        $page_name               = 'frontend.article';
        echo $this->frontend_layout($title, $page_name, $data);
    }
    public function articleDetails(Request $request, $slug)
    {
        $data['is_loggedin']        = session('is_user_login');
        $data['article_detail']     = ArticleModel::where('slug', '=', $slug)->first();
        if (!$data['article_detail']) {
            abort(404, 'Article not found.');
        }

        $data['comments'] = CommentModel::leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name as user_name')
            ->where('comments.is_deleted', '0')
            ->where('status', 'approved')
            ->orderBy('comments.created_at', 'DESC')
            ->get();

        $data['related_articles'] = ArticleModel::where('category_id', $data['article_detail']->category_id)
            ->where('slug', '!=', $slug)
            ->where('status', 'active')
            ->take(10)
            ->get();

        $data['other_category_articles'] = ArticleModel::where('category_id', '!=', $data['article_detail']->category_id)
            ->where('status', 'active')
            ->take(5)
            ->get();

        if ($request->isMethod('post')) {
            $request->validate([
                'comment' => 'required',
            ]);

            try {
                $comment                = new CommentModel();
                $comment->article_id    = $data['article_detail']->id;
                $comment->user_id       = session('user_id');
                $comment->comment       = $request->input('comment');
                $comment->created_at    = now();
                $comment->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Your comment has been submitted and is waiting for admin approval.',
                ]);
            } catch (\Exception $e) {
                \Log::error('Comment submission failed: ' . $e->getMessage());
                return response()->json([
                    'success' => false,
                    'message' => 'There was an error submitting your comment. Please try again.',
                ], 500);
            }
        }
        $title          = 'ArticleHub';
        $page_name      = 'frontend.article-details';
        return $this->frontend_layout($title, $page_name, $data);
    }
    public function search(Request $request)
    {
        $keyword    = $request->input('keyword');
        $query      = ArticleModel::query();
        if ($keyword) {
            $query->where('name', 'LIKE', '%' . $keyword . '%');
        }
        $articles = $query->get();
        return response()->json([
            'articles' => $articles
        ]);
    }
}
