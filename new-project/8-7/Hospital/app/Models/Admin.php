<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    use HasFactory;

    public function getAllTableBS($keywords = null)
    {
        $users = DB::table('users')
            ->select('users.*')
            ->where('usertype', 2)
            ->orderBy('users.created_at', 'DESC'); // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        $users->Paginate(5);

        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
                $query->orWhere('name', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
                $query->orWhere('phone', 'like', '%' . $keywords . '%');
            });
        }

        $users = $users->get();

        return $users;
    }

    public function phantrangBS()
    {
        $trang = DB::table('users')
            ->select('users.*')
            ->where('usertype', 2)
            ->Paginate(5);
        return $trang;
    }

    public function getAllTableYT($keywords = null)
    {
        $users = DB::table('users')
            ->select('users.*')
            ->where('usertype', 3)
            ->orderBy('users.created_at', 'DESC'); // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        $users->Paginate(5);

        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
                $query->orWhere('name', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
                $query->orWhere('phone', 'like', '%' . $keywords . '%');
            });
        }

        $users = $users->get();

        return $users;
    }

    public function phantrangYT()
    {
        $trang = DB::table('users')
            ->select('users.*')
            ->where('usertype', 3)
            ->Paginate(5);
        return $trang;
    }
    public function getAllTableBN($keywords = null)
    {
        $users = DB::table('users')
            ->select('users.*')
            ->where('usertype', 0)
            ->orderBy('users.created_at', 'DESC'); // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        $users->Paginate(5);

        if (!empty($keywords)) {
            $users = $users->where(function ($query) use ($keywords) {
                // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
                $query->orWhere('name', 'like', '%' . $keywords . '%');
                $query->orWhere('email', 'like', '%' . $keywords . '%');
                $query->orWhere('phone', 'like', '%' . $keywords . '%');
            });
        }

        $users = $users->get();
return $users;
    }

    public function phantrangBN()
    {
        $trang = DB::table('users')
            ->select('users.*')
            ->where('usertype', 0)
            ->Paginate(5);
        return $trang;
    }

    public function getAllTableBV($keywords = null)
    {
        $baiviets = DB::table('baiviets')
            ->select('baiviets.*')
            ->orderBy('baiviets.created_at', 'DESC'); // Truy vấn bảng dữ liệu bảng (Bệnh nhân)
        $baiviets->Paginate(5);

        if (!empty($keywords)) {
            $baiviets = $baiviets->where(function ($query) use ($keywords) {
                // Dùng để tìm kiếm thông qua họ tên, email và số điện thoại
                $query->orWhere('name', 'like', '%' . $keywords . '%');
            });
        }

        $baivietss = $baiviets->get();

        return $baiviets;
    }

    public function phantrangBV()
    {
        $trang = DB::table('baiviets')
            ->select('baiviets.*')
            ->Paginate(5);
        return $trang;
    }
    
}