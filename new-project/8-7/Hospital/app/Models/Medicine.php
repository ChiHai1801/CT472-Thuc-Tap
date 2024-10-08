<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Medicine extends Model
{
    protected $fillable = [
        'prescription_id',
        'tenthuoc',
        'donvi',
        'soluong',
        'gia',
        'cachdung',
        'thanhtien'
    ];
    
}
