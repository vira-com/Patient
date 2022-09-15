<?php

namespace App\Http\Controllers\Partner;

use App\Models\Partner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class PartnerController extends Controller
{
    //
    function showlogin()
    {
        if (Auth::user()) {
            return redirect('partner/panel/dashboard');
        }
        return view('partner.auth.login');
    }

    public function login(Request $request)
    {
        $url = $request->url;
        $user = Partner::where('email', $request['email'])->first();
        if ($request) {
            if ($user) {
                if (Auth::guard('partner')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
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
        // $Prescriptions = Prescription::count();
        // $PrescriptionsReceiv = Prescription::where('status', 2);
        // $admin = Auth::guard('admin')->user();
        // $data = array(
        //     'Prescriptions' => $Prescriptions,
        //     'PrescriptionsReceiv' => $PrescriptionsReceiv->count(),
        //     'PrescriptionsReceivMoney' => $PrescriptionsReceiv->sum('price'),
        //     'adminName' => $admin->fname . ' ' . $admin->lname,
        //     'adminLevel' => $admin->level,

        // );   ['data' => $data]
        $user = Auth::guard('partner')->user();
        $data =
            [
                "Name" => $user->name,
            ];
        return view('partner.dashboard.index', ['data' => $data]);
    }

    public function logout()
    {
        Auth::guard('partner')->logout();
        return redirect('/partner/panel/login');
    }
}
