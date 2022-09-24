<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    function showlogin()
    {
        if (Auth::user()) {
            return redirect('admin/panel/dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $url = $request->url;
        $user = Admin::where('email', $request['email'])->first();
        if ($request) {
            if ($user) {
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                    return response(['msg' => 'با موفقیت وارد شدید', 'success' => 'ok', 'url' => @$url]);
                } else {
                    return response(['msg' => 'اطلاعات ورود صحیح نمی باشد', 'success' => 'no']);
                }
            } else {
                return response(['msg' => 'اطلاعات ورود صحیح نمی باشد', 'success' => 'no']);
            }
        }
    }

    public function getDashboard()
    {
        $admin = Auth::guard('admin')->user();
        $data = [
            "Name" => $admin->name,
        ];
        return view('admin.dashboard.index', ['data' => $data]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/panel/login');
    }
}
