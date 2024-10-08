<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Phieukham extends Model
{
    use HasFactory;
    
   // Dùng hiển thị thông tin cho giao diện lập phiếu khám bệnh

    public function getAllTable($filters = [], $keywords = null){

        $users = DB::table('benhnhans')->select('benhnhans.*')     // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        ->orderBy('benhnhans.created_at', 'DESC'); 
        $users->Paginate(5);

        // $users = DB::table('users')->select('users.*')
        // ->where('usertype', '=', '0' );         // Truy vấn bảng dữ liệu bảng (users) với thông tin bệnh nhân thông qua usertype


        
        if(!empty($filters)){
            $users = $users->where($filters);       // Dùng để lọc thông tin như (Giới tính và dịch vụ khám)
        }

        
        if(!empty($keywords)){
            $users = $users->where(function($query) use ($keywords){     // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
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

      // thêm thông tin ở giao diện lập phiếu khám
      public function addPhieu($data){
        
        //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insert into bảng benhs <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
            DB::insert('INSERT INTO benhs (id_patient, benh, trieuchung, thoidiemkham, created_at
            ) values (?, null, ?, ?, ?)', $data);
        }


            // Dùng để lấy thông tin của từng bệnh nhân dựa trên id để hiển thị thông tin trên giao diện lập phiếu
          public function getDetailPhieukham($id){
            $users = DB::table('benhnhans')
            ->select('benhnhans.*')
            ->where('benhnhans.id', '=', $id)
            ->get();
             return $users;
         }

            // Dùng để lấy thông tin của từng bệnh nhân dựa trên id đã được lập phiếu để hiển thị thông tin trên giao diện xem phiếu và in
         public function getDetailInPK($id){
            $users = DB::table('benhnhans')
            ->join('benhs', 'benhs.id_patient', '=', 'benhnhans.id' )
            ->select('benhnhans.*', 'benhs.trieuchung')
            ->where('benhnhans.id', '=', $id)->get();

             return $users;
         }

}
