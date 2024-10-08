<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Hoadon extends Model
{
    use HasFactory;
    
    // Dùng hiển thị thông tin cho giao diện lập hóa đơn

    public function getAllTable($filters = [], $keywords = null){

        $users = DB::table('prescriptions')
        ->select('prescriptions.*',  'benhnhans.*')
        ->join('benhnhans','benhnhans.id' , '=','prescriptions.id_patient' )
        ->orderBy('prescriptions.ngaykham', 'DESC');   

        $users->Paginate(5);    // Hiển thị danh sách với tối đa 5 thông tin


        if(!empty($filters)){
            $users = $users->where($filters);  // Dùng để lọc thông tin như (Giới tính và dịch vụ khám)
        }

        
        if(!empty($keywords)){
            $users = $users->where(function($query) use ($keywords){  // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
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

       // Dùng để lấy thông tin của từng bệnh nhân dựa trên id để hiển thị thông tin trên giao diện lập hóa đơn
          
          public function getDetailHD($id){

                //<<<<<<<<<<<<<< Bảng bệnh nhân <<<<<<<<<<<<<<
            $users = DB::table('benhnhans')
            ->select('benhnhans.*')
            ->where('benhnhans.id', '=', $id)
            ->get();
             return $users;
         }
     
}
