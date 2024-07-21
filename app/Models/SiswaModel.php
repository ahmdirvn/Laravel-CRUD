<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table="siswa";

    //mengatur relasi many to one ke model kelas (banyak siswa memiliki 1 kelas)
    public function kelas(){
        return $this->belongsTo(KelasModel::class, 'kelas_id');
    }
}
