<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prescription;
use App\Models\Medicine;

class LietKeDonThuoc extends DB
{

    private $users;

    public function __construct(){
        $this->users = new Prescription();
    }

    public function lkdt($id =0)
    {
        $pres = [];

        $prescriptions = Prescription::with('medicines')->get();
        
        return view('doctor.bacsi.lietkedonthuoc', compact('prescriptions'));
    }
    
}
