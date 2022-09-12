<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerPatientController extends Controller
{
    //
    public function showSendInfo()
    {
        $user = Auth::guard('partner')->user();
        $data =
            [
                "partnerName" => $user->Name,
            ];
        return view('partner.patient.sendinfo', ['data' => $data]);
    }

    public function sendInfo(Request $request)
    {
        $user = Auth::guard('partner')->user();
        dd($request->all());

    }

}
