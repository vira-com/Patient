<?php

namespace App\Http\Controllers\DrugStore;

use App\Http\Controllers\Controller;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DrugStorePrescriptionsController extends Controller
{

    function getPrescriptions()
    {
        $user = Auth::guard('drugstore')->user();
        $prescriptions = Prescription::all();
        $data =
            [
                    "Name" => $user->name,
            ];
        return view('drugstore.prescriptions.getPrescriptions', ['data' => $data, 'prescriptions' => $prescriptions]);
        
    }

}
