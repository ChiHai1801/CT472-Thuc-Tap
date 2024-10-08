<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Thuoc extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'lothuoc', 'name', 'ngaynhap', 'dongia', 'dangbaoche', 'tennhacungcap'];

    public function getThuocs()
    {
        $thuocs = DB::table('thuocs')
            ->select('thuocs.*')
            ->get();
        // $thuocs->Paginate(5);
        return $thuocs;
    }

    public function getThuoc($id)
    {
        $thuocs = DB::table('thuocs')
            ->select('thuocs.*')
            ->where('id', $id)
            ->get();
        
        return $thuocs;
    }
}
