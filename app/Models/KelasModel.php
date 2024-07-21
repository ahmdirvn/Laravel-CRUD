<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasModel extends Model
{
    use HasFactory;
    protected $table = 'kelas';

    //mengatur relasi one to many ke model siswa (1kelas memiliki banyak siswa)
    public function siswa(){
        return $this->hasMany(SiswaModel::class, 'kelas_id');
    }

    //mengatur relasi one to one ke model guru (1kelas dimiliki oleh 1 guru)
    public function guru()
    {
        return $this->belongsTo(GuruModel::class, 'guru_id');
    }

}
