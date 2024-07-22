<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    //
    function index(){
        return view('laporan.list');
    }

    function read(){
        $data = [
            "gurus" => GuruModel::all(),
            "kelas" => KelasModel::all(),
            "siswas" => SiswaModel::all(),
        ];
        return view('laporan.read', $data);
    }

    function data_table(){
        $query = GuruModel::with(['kelas', 'kelas.siswa']); // Eager loading 
    
        // Filter berdasarkan ID kelas
        if (request()->has('filter_kelas') && request('filter_kelas') != '') {
            $query->whereHas('kelas', function($q) {
                $q->where('id', request('filter_kelas'));
            });
        }
    
        return DataTables::of($query)
            ->addColumn('nama_guru', function($row) {
                // Jika tidak ada guru, kembalikan '(tidak ada data)'
                return $row->nama ?? '(tidak ada data)'; // mengambil nama guru
            })
            ->addColumn('nama_kelas', function($row) {
                // Jika nama_kelas tidak null, kembalikan nama_kelas, jika tidak '(tidak ada data)'
                if($row->kelas->isEmpty()){
                    return '(belum mennjadi wali kelas)';
            }
            return $row->kelas->pluck('nama_kelas')->implode(', ');
            })
            ->addColumn('nama_siswa', function($row) {
                 // Cek apakah guru memiliki kelas dan kelas tersebut memiliki siswa
            if ($row->kelas->isNotEmpty() && $row->kelas->first()->siswa->isNotEmpty()) {
                // Ambil semua nama siswa dari semua kelas dan gabungkan dengan koma
                $namaSiswa = $row->kelas->flatMap(function($kelas) {
                    return $kelas->siswa->pluck('nama');
                })->implode(', ');

                return $namaSiswa;
            }
            return '(tidak ada data)';
            })

            ->filterColumn('nama_kelas', function($query, $keyword) {
                $query->where('nama_kelas', 'like', "%{$keyword}%");
            })
            ->make(true); // Return data as JSON
    }
}
