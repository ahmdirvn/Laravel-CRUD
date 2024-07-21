<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruModel extends Model
{
    use HasFactory;
    protected $table = 'guru';

    //mengatur relasi one to many ke model kelas ( guru memiliki banyak kelas)
    public function kelas()
    {
        return $this->hasMany(KelasModel::class, 'guru_id');
    }
}
