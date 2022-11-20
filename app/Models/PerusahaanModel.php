<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerusahaanModel extends Model
{
    use HasFactory;

    protected $table = "perusahaan";
    protected $fillable = [
        'nama',
        'telepon',
        'status_dihubungi',
        'deskripsi',
        'pic'
    ];

    public function getById($id){
        return $this->find($id);
    }
}
