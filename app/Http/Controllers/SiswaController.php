<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    //
    function index(){
        return view('siswa.list');
    }

    function read(){

        $data = array(
            "siswas" => SiswaModel::all()
        );
        $kelas = KelasModel::all(); // Mengambil semua data kelas
        return view('siswa.read', $data, compact('kelas'));
    }

    function insert(Request $request){

        if($request-> isMethod('post')){
            $siswa = new SiswaModel();
            $siswa->nama = $request->nama;
            $siswa->nis = $request->nis;
            $siswa->email = $request->email;
            $siswa->kelas_id = $request->kelas_id; // Ganti dengan kelas_id
            $siswa->agama = $request->agama;
            $siswa->save();
            return redirect('/siswa')->with(['message' => 'Data berhasil disimpan']);
        }
        $kelas = KelasModel::all(); // Mengambil semua data kelas
        return view('siswa.formCreate', compact('kelas'));
    }

    function update(Request $request){
        $siswa = SiswaModel::find($request->id);
        $data = array(
            "siswa" => $siswa
        );

        if($request-> isMethod('post')){
            $siswa->nama = $request->nama;
            $siswa->nis = $request->nis;
            $siswa->email = $request->email;
            $siswa->kelas_id = $request->kelas_id; // Ganti dengan kelas_id
            $siswa->agama = $request->agama;
            $siswa->save();
            return redirect('/siswa')->with(['message' => 'Update Data berhasil disimpan']);
        }
        $kelas = KelasModel::all(); // Mengambil semua data kelas
        return view('siswa.formEdit', $data, compact('kelas'));
    }

    function delete(Request $request){
        $siswa = SiswaModel::find($request->id);
        $siswa->delete();
        return redirect('/siswa')->with(['message' => 'Data berhasil dihapus']);
    }

    function data_table(){
        $query = SiswaModel::with('kelas'); // Eager loading the 'kelas' relationship

        //cek ketika ada request dari ajax filter nama_kelas
        if (request()->has('filter_kelas') && request('filter_kelas') != '') {
            $query->whereHas('kelas', function($q) {
                $q->where('id', request('filter_kelas'));
            });
        }
    
        return DataTables::of($query)
            ->addColumn('nama_kelas', function($row){
                return $row->kelas->nama_kelas; // mengakses nama_kelas dari relasi kelas
            })
            ->addColumn('action', function($row){
                return '<button class="btn btn-warning" onclick="showSiswa(' . $row->id . ')">Edit</button>
                        <button class="btn btn-danger" onclick="deleteSiswa(' . $row->id . ')">Delete</button>';
            })
            //mencari data yang berkaitan dengan relasi model siswa dan kelas berdasarkan nama_kelas
            ->filterColumn('kelas.nama_kelas', function($query, $keyword) {
                $query->whereHas('kelas', function($q) use ($keyword) {
                    $q->where('nama_kelas', 'like', "%{$keyword}%");
                });
            })
            ->make(true); // Return data as JSON
    }
    

}

