<?php

namespace App\Http\Controllers\DrugStore;

use App\Http\Controllers\Controller;
use App\Models\DrugStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugStoreController extends Controller
{
    //
    function showlogin()
    {
        if (Auth::user()) {
            return redirect('drugstore/panel/dashboard');
        }
        return view('drugstore.auth.login');
    }

    public function login(Request $request)
    {
        $url = $request->url;
        $user = DrugStore::where('email', $request['email'])->first();
        if ($request) {
            if ($user) {
                if (Auth::guard('drugstore')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
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
        $user = Auth::guard('drugstore')->user();
        $data =
            [
                "Name" => $user->name,
            ];
        return view('drugstore.dashboard.index', ['data' => $data]);
    }

    public function logout()
    {
        Auth::guard('drugstore')->logout();
        return redirect('/drugstore/panel/login');
    }
}
