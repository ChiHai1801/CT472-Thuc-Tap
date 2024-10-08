<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Baiviet extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'noidung', 'ttnoidung', 'ttnoibat', 'danhmuc', 'photo_path', 'create_at'];

    public function getPost($id)
    {
        $thuocs = DB::table('baiviets')
            ->select('baiviets.*')
            ->where('id', $id)
            ->get();
        return $thuocs;
    }

    public function getContent()
    {
        $blog = DB::table('baiviets')
            ->select('baiviets.noidung')
            ->get();
        return $blog;
    }

    public function getPosts()
    {
        $blog = DB::table('baiviets')
            ->select('baiviets.*')
            ->get();
        return $blog;
    }
    public function getNoibat()
    {
        $blog = DB::table('baiviets')
            ->select('baiviets.*')
            ->where('ttnoibat', 1)
            ->get();
        return $blog;
    }

    public function getAllTableBV($keywords = null)
    {
        $baiviet = DB::table('baiviets')
            ->select('baiviets.*')
            ->orderBy('baiviets.created_at', 'DESC'); // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        $baiviet->Paginate(3);
        if (!empty($keywords)) {
            $baiviet = $baiviet->where(function ($query) use ($keywords) {
                // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
                $query->orWhere('danhmuc', 'like', '%' . $keywords . '%');
            });
        }

        $baiviet = $baiviet->get();

        return $baiviet;
    }

    public function phantrangBV()
    {
        $trang = DB::table('baiviets')
            ->select('baiviets.*')
            ->Paginate(3);
        return $trang;
    }

}
