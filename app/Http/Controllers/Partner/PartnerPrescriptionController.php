<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerPrescriptionController extends Controller
{
    //
    public function showsPrescription()
    {
        $user = Auth::guard('partner')->user();
        $data =
            [
                "Name" => $user->name,
            ];
        return view('partner.prescription.sendPrescription', ['data' => $data]);
    }

    public function sendPrescription(Request $request)
    {

        $bimeh = $request['bimeh'];
        $drugstores_id = $request['drugstores'];
        $tracking_code = null;
        $national_code = null;
        $prescription = null;

        if ($bimeh == 'tamin') {
            $tracking_code = $request['tracking_code'];
            $national_code = $request['national_code'];
        } elseif ($bimeh == 'hdk') {
            $national_code = $request['national_code'];
        } elseif ($bimeh == 'freeb') {
            $prescription = $request['prescription'];
        } else {
            dd('what is this!!!');
        }

        $new_prescription =
            [
                'patient_code' => $national_code,
                'partner_id' => $drugstores_id,
                'cost' => 0,
                'tracking_code' => $tracking_code,
                'source_img_path' => $prescription,
                'bimeh' => $bimeh,
            ];

        // API BIMEH
        // cost = ???
        //
        dump($new_prescription);
        $pre = Prescription::create($new_prescription);
        dump($pre);
        // return redirect('/partner/panel/sendPrescription');
    }
}
