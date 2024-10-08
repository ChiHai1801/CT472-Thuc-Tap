<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Yta extends Model
{
    use HasFactory;

       // Dùng hiển thị thông tin cho giao diện Trang chủ

    public function getAllTable($filters = [], $keywords = null){

        $users = DB::table('benhnhans')->select('benhnhans.*')      // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        ->where('benhnhans.trangthai', '!=', 2)
        ->orderBy('benhnhans.created_at', 'DESC');

      

        $users->Paginate(5);        // Hiển thị danh sách với tối đa 5 thông tin


        if(!empty($filters)){
            $users = $users->where($filters);  // Dùng để lọc thông tin như (Giới tính và xác nhận thông tin)
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
}
