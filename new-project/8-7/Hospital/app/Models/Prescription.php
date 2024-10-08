<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prescription extends Model
{
    protected $fillable = ['ten_doctor', 'id_patient', 'ten_bn', 'ngaykham', 'hentaikham', 'tongtien', 'chandoan'];

    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'prescription_id');
    }

}
