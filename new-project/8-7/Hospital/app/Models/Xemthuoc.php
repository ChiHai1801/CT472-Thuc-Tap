<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Xemthuoc extends Model
{
    use HasFactory;

    // Dùng hiển thị thông tin cho giao diện xem toa thuốc và xem lịch sử đơn thuốc

    public function getAllTable($filters = [], $keywords = null){
        $users = DB::table('prescriptions')
        ->select('prescriptions.*',  'benhnhans.*')
        ->join('benhnhans','benhnhans.id' , '=','prescriptions.id_patient' )
        ->orderBy('prescriptions.ngaykham', 'DESC');     // Truy vấn bảng dữ liệu bảng (Bệnh nhân) và (Kê đơn thuốc)
             
        $users->Paginate(5);    // Hiển thị danh sách với tối đa 5 thông tin
            
            if(!empty($filters)){
                $users = $users->where($filters);   // Dùng để lọc thông tin như (Giới tính và dịch vụ khám)
            }
    
            
            if(!empty($keywords)){
                $users = $users->where(function($query) use ($keywords){    // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
                    $query->orWhere('name_bn', 'like', '%'.$keywords.'%');
                    $query->orWhere('email_bn', 'like', '%'.$keywords.'%');
                    $query->orWhere('phone_bn', 'like', '%'.$keywords.'%');
    
                });
            }
            $users = $users->get();
        
        return $users;
     }


     public function phantrang(){
        $trang = DB::table('benhnhans')->select('benhnhans.*')->Paginate(5);
        return $trang;
    }



     // Dùng để lấy thông tin của từng bệnh nhân dựa trên id để hiển thị thông tin trên giao diện (toa thuốc và đơn thuốc)
     public function getDetail($id){
        $users = DB::table('benhnhans')
        ->join('prescriptions','benhnhans.id' , '=','prescriptions.id_patient' )
        ->select('prescriptions.chandoan', 'prescriptions.tongtien', 'prescriptions.ten_doctor','prescriptions.ngaykham', 'benhnhans.*')
        ->where('benhnhans.id', '=', $id)->get();
         return $users;
     }


     // hiển thị danh sách gồm thông tin của thuốc của bệnh nhân nào thông qua id
     public function DSthuoc($id){
        $users = DB::table('prescriptions')
        ->join('medicines', 'medicines.prescription_id', '=','prescriptions.id' )
        ->select('prescriptions.*', 'medicines.*')
        ->where('prescriptions.id_patient', '=', $id)->get();
        return $users;
     }
}
