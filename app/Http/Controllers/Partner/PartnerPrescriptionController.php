<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\DrugStore;
use App\Models\Partner;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PartnerPrescriptionController extends Controller
{
    //
    public function showsPrescription()
    {
        $user = Auth::guard('partner')->user();
        $drugstores = DrugStore::all();
        $data =
            [
                "name" => $user->name,
            ];
        return view('partner.prescription.sendPrescription', ['data' => $data, 'drugstores' => $drugstores]);
    }

    public function sendPrescription(Request $request)
    {
        $user = Auth::guard('partner')->user();

        $bimeh = $request['bimeh'];
        $drugstores_id = (int)$request['drugstores'];
        $tracking_code = null;
        $national_code = null;
        $prescription = null;

        if ($bimeh == 'tamin') {
            $national_code = $request['national_code'];
        } elseif ($bimeh == 'hdk') {
            $national_code = $request['national_code'];
            $tracking_code = $request['tracking_code'];
        } elseif ($bimeh == 'freeb') {
            $national_code = $request['national_code'];
            // $prescription = $request['prescription'];

            // $relfilename = $user->id . "-" . time() . '.txt';
            // $path = ("uploads/prescriptions-images/" . $relfilename);
            // Storage::put($path, $request['prescription']);
    
            
        } else {
            dd('what is this!!!');
        }

        $new_prescription =
            [
                'patient_code' => $national_code,
                'partner_id' => $user['partner_id'],
                'drugstore_id' => $drugstores_id,
                'cost' => 0,
                'tracking_code' => $tracking_code,
                'source_img_path' => $prescription,
                'bimeh' => $bimeh,
            ];

        // API BIMEH
        // cost = ???
        //

        $pre = Prescription::create($new_prescription);
        // dump($pre);
        return redirect('/partner/panel/sendPrescription');
    }
}
