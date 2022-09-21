<?php

namespace App\Http\Controllers\DrugStore;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DrugStorePrescriptionsController extends Controller
{

    function getPrescriptions()
    {
        $user = Auth::guard('drugstore')->user();
        $prescriptions = Prescription::where('drugstore_id', $user['drugstore_id'])->orderByDesc('created_at')->get();
        $doctors_name = array();
        foreach ($prescriptions as $prescription) {
            $partner = Partner::firstWhere('partner_id', $prescription['partner_id']);
            array_push($doctors_name, $partner['doctor_Name']);
        };
        $data =
            [
                "name" => $user->name,
            ];
        return view('drugstore.prescriptions.getPrescriptions', ['data' => $data, 'prescriptions' => $prescriptions, 'doctors_name' => $doctors_name,]);
    }

    function getPrescription($id)
    {
        $user = Auth::guard('drugstore')->user();
        $prescription = Prescription::firstWhere('prescription_id', $id);
        $data =
            [
                "name" => $user->name,
            ];

        $paths = $prescription['source_img_path'];
        $imgs = array();
        if ($paths != null) {
            $path_arr = explode('###', $paths);
            foreach ($path_arr as $path) {
                // dump($path);
                $img = Storage::url($path);

                array_push($imgs, $img);
            }
        }
        // dd($imgs);
        return view('drugstore.prescriptions.viewPrescription', ['data' => $data, 'prescription' => $prescription, 'imgs' => $imgs]);
    }

    function getNotification()
    {
        $user = Auth::guard('drugstore')->user();
        $prescriptions = Prescription::where('drugstore_id', $user['drugstore_id'])->where('status', 0)->count();

        return Response()->json(
            [
                'success' => 1,
                'data' => ['newPrescriptions' => $prescriptions],
            ]
        );
    }

    
}
