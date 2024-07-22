<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    //
    function index(){
        return view('guru.list');
    }

    function read(){

        $data = array(
            "gurus" => GuruModel::all()
        );
        $kelas = KelasModel::all(); // Mengambil semua data kelas
        return view('guru.read', $data, compact('kelas'));
    }

    function insert(Request $request){

        if($request-> isMethod('post')){
            $guru = new GuruModel();
            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->save();
            return redirect('/guru')->with(['message' => 'Data berhasil disimpan']);
        }
        return view('guru.formCreate');
    }

    function update(Request $request){
        $guru = GuruModel::find($request->id);
        $data = array(
            "guru" => $guru
        );

        if($request-> isMethod('post')){
            $guru->nama = $request->nama;
            $guru->nip = $request->nip;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->save();
            return redirect('/guru')->with(['message' => 'Update Data berhasil disimpan']);
        }
        return view('guru.formEdit', $data);
    }

    function delete(Request $request){
        $guru = GuruModel::find($request->id);
        $guru->delete();
        return redirect('/guru')->with(['message' => 'Data berhasil dihapus']);
    }

    function data_table(){
        $query = GuruModel::with('kelas'); // Eager loading the 'kelas' relationship

        //cek ketika ada request dari ajax filter nama_kelas
        if (request()->has('filter_kelas') && request('filter_kelas') != '') {
            $query->whereHas('kelas', function($q) {
                $q->where('id', request('filter_kelas'));
            });
        }
    
        return DataTables::of($query)
            ->addColumn('nama_kelas', function($row){
                // Check if 'kelas' relationship is empty
                if ($row->kelas->isEmpty()) {
                    return 'belum menjadi wali kelas';
                }
                // Access and implode all 'nama_kelas' from the 'kelas' relationship
                return $row->kelas->pluck('nama_kelas')->implode(', ');
            })
            ->addColumn('action', function($row){
                return '<button class="btn btn-warning" onclick="showGuru(' . $row->id . ')">Edit</button>
                        <button class="btn btn-danger" onclick="deleteGuru(' . $row->id . ')">Delete</button>';
            })
            //mencari data yang berkaitan dengan relasi model guru dan kelas berdasarkan nama_kelas
            ->filterColumn('kelas.nama_kelas', function($query, $keyword) {
                $query->whereHas('kelas', function($q) use ($keyword) {
                    $q->where('nama_kelas', 'like', "%{$keyword}%");
                });
            })
            ->make(true); // Return data as JSON
    }

}
