<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Benhnhan extends Model
{
    use HasFactory;

    public function prescription()
    {
        return $this->hasOne(Prescription::class, 'id_patient');
    }

    public function getDetailBN($id){
        $users = DB::table('benhnhans')
        ->select('benhnhans.*')
        ->where('benhnhans.id', '=', $id)
        ->get();
         return $users;
     }

     // Dùng để lưu thông tin về triệu chứng, thời điểm khám của bệnh nhân sau khi đăng nhập
     public function addDanhsach($data, ){

        //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insert into bảng bệnh nhân <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        DB::insert('INSERT INTO benhs (id_patient , benh, trieuchung, thoidiemkham, created_at
        ) values ( 1, null, ?, ?, ?)', $data);
}


}
