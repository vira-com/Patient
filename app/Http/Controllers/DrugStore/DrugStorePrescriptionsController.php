<?php

namespace App\Http\Controllers\DrugStore;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DrugStorePrescriptionsController extends Controller
{

    function getPrescriptions()
    {
        $user = Auth::guard('drugstore')->user();
        $prescriptions = Prescription::where('drugstore_id', $user['drugstore_id'])->orderByDesc('created_at')->get();
        $data =
            [
                "name" => $user->name,
            ];
        return view('drugstore.prescriptions.getPrescriptions', ['data' => $data, 'prescriptions' => $prescriptions]);
    }

    function getPrescription($id)
    {
        $user = Auth::guard('drugstore')->user();
        $prescription = Prescription::firstWhere('prescription_id', $id);
        $data =
            [
                "name" => $user->name,
            ];
        // dump($prescription);
        // dump($prescription['bimeh']);
        return view('drugstore.prescriptions.view', ['data' => $data, 'prescription' => $prescription]);
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
