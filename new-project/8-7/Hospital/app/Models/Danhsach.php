<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Danhsach extends Model
{
    use HasFactory;
    
    // Dùng hiển thị thông tin cho giao diện lập danh sách khám bệnh
    
    public function getAllTable($filters = [], $keywords = null){

        $users = DB::table('benhnhans')->select('benhnhans.*')
        ->orderBy('benhnhans.created_at', 'DESC');  // Truy vấn bảng dữ liệu bảng (Bệnh nhân)

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


    // thêm thông tin 
    public function addDanhsach($data){

                //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< Insert into bảng bệnh nhân <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        DB::insert('INSERT INTO benhnhans (name_bn, email_bn, phone_bn, address_bn, cccd_bn, gender_bn, ngaysinh_bn, examination_service, usertype, 
        email_averified_at, password_bn, current_team_id, profile_photo_path,  created_at
        ) values ( ?, ?, ?, ?, ?, ?, ?, ?, 0, null, ?, null, null, ?)', $data);

     }


    // update thông tin  
     public function uploadDS($data, $id){
        $data []= $id;

                //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< update bảng bệnh nhân <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
        return DB::update('UPDATE benhnhans SET name_bn = ?, email_bn = ?, phone_bn = ?, address_bn = ?, cccd_bn = ?, gender_bn = ?, ngaysinh_bn = ?,
        examination_service = ?, usertype = 0, email_averified_at = null, password_bn = ?, current_team_id = null, 
        profile_photo_path = null,  created_at = ?  WHERE id = ?', $data);
     }


           
          // Dùng để lấy thông tin của từng bệnh nhân dựa trên id để hiển thị thông tin trên giao diện sửa thông tin (edit)
          
          public function getDetailDS($id){

                //<<<<<<<<<<<<<< Bảng bệnh nhân <<<<<<<<<<<<<<
            $users = DB::table('benhnhans')
            ->select('benhnhans.*')
            ->where('benhnhans.id', '=', $id)
            ->get();
             return $users;
         }


         // Xóa thông tin bệnh nhân
         public function DeleteUser($id){
                return DB::delete("DELETE FROM benhnhans WHERE id=?", [$id]);
         }
     
}
