<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\DrugStore;
use App\Models\Partner;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;

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
        return view('partner.prescription.sendPrescription', ['data' => $data, 'drugstores' => $drugstores, 'partner' => $user]);
    }

    public function sendPrescription(Request $request)
    {
        // dd($request);
        $user = Auth::guard('partner')->user();

        $bimeh = $request['bimeh'];
        $drugstores_id = (int)$request['drugstores'];
        $tracking_code = null;
        $national_code = null;
        $paths = null;

        if ($bimeh == 'tamin') {
            $national_code = $request['national_code'];
        } elseif ($bimeh == 'hdk') {
            $national_code = $request['national_code'];
            $tracking_code = $request['tracking_code'];
        } elseif ($bimeh == 'freeb') {
            $national_code = $request['national_code'];
            $imgs = $request['images'];
            $paths = '';
            for ($i = 0; $i < count($imgs); $i++) {
                if ($imgs[$i] != null) {
                    $relfilename = $user['partner_id'] . "-" . time() . "-" . $i + 1 . "." . $imgs[$i]->getClientOriginalExtension();
                    $path = "public/prescriptions-images/" . $relfilename;
                    Storage::put($path, File::get($imgs[$i]));
                    $paths = $paths . $path . '###';
                }
            }
            if (strlen($paths) > 0) {
                $paths = mb_substr($paths, 0, -3);
            }
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
                'source_img_path' => $paths,
                'bimeh' => $bimeh,
            ];

        // API BIMEH
        // cost = ???
        //

        $pre = Prescription::create($new_prescription);
        // dump($pre);
        return redirect('/partner/panel/sendPrescription');
    }

    function getQRCode($mobile_token)
    {
        $partner = Partner::firstWhere('token_mobile', $mobile_token);
        if ($partner) {
            if (Auth::guard('partner')->attempt(['email' => $partner['email'], 'password' => $partner['password'], $request->get('remember')])) {
                return redirect('partner/panel/sendPrescription');
            } else {
                return redirect('partner_login');
            }
        } else {
            return redirect('partner_login');
        }
    }

    // function 

}
