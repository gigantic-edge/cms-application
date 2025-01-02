<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'email'             => 'required|email',
                'password'          => 'required|string',
            ], [
                'email.required'        => 'We need your email address to proceed.',
                'email.email'           => 'Make sure to enter a valid email address.',
                'password.required'     => 'A password is necessary for your account.',
            ]);

            // $user = User::where('email', $validatedData['email'])->first();
            // if (!$user) {
            //     return redirect()->back()->with([
            //         'message' => 'No user found with this email.',
            //         'type'    => 'error',
            //     ]);
            // }
            // if (!Hash::check($validatedData['password'], $user->password)) {
            //     return redirect()->back()->with([
            //         'message' => 'Incorrect password.',
            //         'type'    => 'error',
            //     ]);
            // }
            // if($user->is_approved != 1){
            //     return redirect()->back()->with([
            //         'message' => 'Your request is not approved by our Administrator. Please wait or contact the Administrator.',
            //         'type'    => 'warning',
            //     ]);
            // }
            // return redirect('Administrator/dashboard')->with([
            //     'message' => 'Logged in successfully.',
            //     'type'    => 'success',
            // ]);


            /**using auth function */
            if (Auth::guard('admin')->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {

                $sessionData = Auth::guard('admin')->user();
                if ($sessionData->is_approved != 1) {
                    return redirect()->back()->with([
                        'message' => 'Your request is not approved by our Administrator. Please wait or contact the Administrator.',
                        'type'    => 'warning',
                    ]);
                }
                if ($sessionData->role == 'USER') {
                    return redirect()->back()->with([
                        'message' => 'You don\'t have access to perform here. Please contact the Administrator.',
                        'type'    => 'warning',
                    ]);
                }

                $request->session()->put('user_id', $sessionData->id);
                $request->session()->put('name', $sessionData->name);
                $request->session()->put('email', $sessionData->email);
                $request->session()->put('mobile', $sessionData->mobile);
                $request->session()->put('user_type', $sessionData->role);
                $request->session()->put('is_admin_login', 1);

                return redirect('Administrator/dashboard')->with([
                    'message' => 'Logged in successfully.',
                    'type'    => 'success',
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'You have entered an invalid email or password.',
                    'type'    => 'error',
                ]);
            }
            /**using auth function */
        }
        return view('admin.login');
    }
    public function dashboard()
    {
        $sessionData        = session()->all();
        $uId                = $sessionData['user_id'];
        $data               = [];
        $title              = 'Dashboard';
        $page_name          = 'admin.dashboard';
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function profile(Request $request)
    {
        $uId                    = session()->get('user_id');
        $data['user_details']   = User::where('id', '=', $uId)->first();
        $title                  = 'Profile';
        $page_name              = 'admin.profile';
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name'              => 'required|string|max:100',
                'email'             => 'required|email',
                'mobile'            => 'required|string|max:10',
                'password'          => 'nullable|min:6',
                'confirm-password'  => 'nullable|same:password',
            ], [
                'email.required'        => 'We need your email address to proceed.',
                'email.email'           => 'Make sure to enter a valid email address.',
                // 'password.required'     => 'A password is necessary for your account.',
                'confirm-password.same' => 'The confirmation password does not match.',
            ]);

            if ($validatedData['password'] == $validatedData['confirm-password']) {
                $postedData = [
                    'name'  => $validatedData['name'],
                    'email' => $validatedData['email'],
                    'mobile' => $validatedData['mobile'],
                    // 'password' => Hash::make($validatedData['password']),
                ];
                if ($validatedData['password']) {
                    $postedData = [
                        'password' => Hash::make($validatedData['password']),
                    ];
                }
                User::where('id', $uId)->update($postedData);
                return redirect('/Administrator/dashboard')->with([
                    'message' => 'Profile Updated !!.',
                    'type'    => 'success',
                ]);
            } else {
                return redirect()->back()->with([
                    'message' => 'Password does not match.',
                    'type'    => 'error',
                ]);
            }
        }
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function logout()
    {
        session()->forget(['user_id', 'name', 'email', 'mobile', 'user_type', 'is_admin_login']);
        Auth::guard('admin')->logout();
        return redirect()->back()->with([
            'message' => 'Your request is not approved by our Administrator. Please wait or contact the Administrator.',
            'type'    => 'warning',
        ]);
    }
    public function users()
    {
        $data['users']      = User::where('role', '!=', 'ADMIN')->orderby('created_at', 'DESC')->paginate(10);
        $title              = 'Users';
        $page_name          = 'admin.module.user.users';
        echo $this->admin_after_login_layout($title, $page_name, $data);
    }
    public function updateUserStatus(Request $request)
    {
        $validated = $request->validate([
            'userId'    => 'required',
            'status'    => 'required',
        ]);
        $user    = User::find($request->userId);
        if (!$user) {
            return response()->json(['error' => 'Try Again'], 404);
        }
        $user->is_approved = $request->status;
        $user->save();
        return response()->json(['success' => 'User Updated']);
    }
    public function updateUserRole(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $postedData = [
                'role' => $request->role
            ];
            User::where('id', '=', $id)->update($postedData);
            return redirect('/Administrator/users')->with([
                'message' => 'User Role update successfully !!.',
                'type'    => 'success',
            ]);
        }
    }
}
