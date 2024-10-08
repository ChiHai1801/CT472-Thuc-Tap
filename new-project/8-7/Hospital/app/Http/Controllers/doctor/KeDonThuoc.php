<?php

namespace App\Http\Controllers\doctor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\kedon;
use App\Models\Prescription;
use App\Models\Medicine;
use App\Models\Benhnhan;

class KeDonThuoc extends kedon
{
    public $data = [];
    private $kedonthuoc;

    public function __construct()
    {
        $this->kedonthuoc = new kedon();
    }

    public function taodonthuoc(Request $request)
    {
        $prescription = Prescription::create([
            'id_patient' => $request->mabn,
            'ten_doctor' => $request->tenbs,
            'ten_bn' => $request->tenbn,
            'ngaykham' => $request->tg_kham,
            'hentaikham' => $request->tg_taikham,
            'chandoan' => $request->chandoan,
            'tongtien' => $request->tongTien,
        ]);
        // dd($prescription);
        return redirect('doctor/bacsi/kedon');
    }
    public function kedonthuoc()
    {
        $kedons = $this->kedonthuoc->chonthuoc();
        $madt = DB::table('prescriptions')
            ->latest()
            ->value('id');
        return view('doctor.bacsi.kedonthuoc', compact('kedons', 'madt'));
    }

    public function addthuoc(Request $request)
    {
        $tableData = $request->table_data;
        $Dataraw = json_decode($tableData, true);
        $Data = array_slice($Dataraw, 0, -4);

        foreach ($Data as $row) {
            $medicine = Medicine::create([
                'prescription_id' => $Dataraw[count($Dataraw) - 4],
                'tenthuoc' => $row['tenThuoc'],
                'donvi' => $row['donVi'],
                'soluong' => $row['soLuong'],
                'gia' => $row['giaBan'],
                'cachdung' => $row['cachDung'],
                'thanhtien' => $row['thanhTien'],
            ]);

        }
        $id = $Dataraw[count($Dataraw) - 4];
        $prescription = Prescription::find($id);
        $prescription->update([
            'hentaikham' => $Dataraw[count($Dataraw) - 3],
            'chandoan' => $Dataraw[count($Dataraw) - 2],
            'tongtien' =>  end($Dataraw)
        ]);

        $id = Prescription::find($id);
        $user = Benhnhan::find($id->id_patient);
        $user->trangthai = 2;
        $user->save();

        return redirect('doctor/bacsi/lietkedonthuoc');
    }

}