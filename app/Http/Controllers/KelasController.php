<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use App\Models\KelasModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    //
    function index(){
        return view('kelas.list');
    }

    function read(){
        $data = array(
            "kelass" => KelasModel::all()
        );
        $guru = GuruModel::all(); // Mengambil semua data guru
        return view('kelas.read', $data, compact('guru')); //compact digunakan untuk mengirim data guru ke view read
    }

    function insert(Request $request){
        if($request->isMethod('post')){
            $kelas = new KelasModel();
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->guru_id = $request->guru_id; //meminta guru_id
            $kelas->save();
            return redirect('/kelas')->with(['message' => 'Data berhasil disimpan']);
        }
        $guru = GuruModel::all(); // Mengambil semua data guru
        return view('kelas.formCreate', compact('guru')); //compact digunakan untuk mengirim data guru ke view formCreate
    }

    function update(Request $request){
        $kelas = KelasModel::find($request->id);
        $data = array(
            "kelas" => $kelas
        );
        if($request->isMethod('post')){
            $kelas = KelasModel::find($request->id);
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->guru_id = $request->guru_id; //meminta guru_id
            $kelas->save();
            return redirect('/kelas')->with(['message' => 'Data kelas berhasil diedit']);
        }
        $guru = GuruModel::all(); // Mengambil semua data guru
        return view('kelas.formEdit', $data, compact('guru')); //compact digunakan untuk mengirim data guru ke view formEdit
    }

    function delete(Request $request){
        $kelas = KelasModel::find($request->id);
        $kelas->delete();
        return redirect('/kelas')->with(['message' => 'Data kelas berhasil dihapus']);
    }

    function data_table(){
        $query = KelasModel::with('guru'); // Eager loading the 'guru' relationship
    
        return DataTables::of($query)
            ->addColumn('wali_kelas', function($row){
                // Check if 'guru' relationship is null
                if (is_null($row->guru)) {
                    return 'belum menjadi wali kelas';
                }
                return $row->guru->nama; // Access 'nama' from the 'guru' relationship
            })
            ->addColumn('action', function($row){
                return '<button class="btn btn-warning" onclick="showKelas(' . $row->id . ')">Edit</button>
                        <button class="btn btn-danger" onclick="deleteKelas(' . $row->id . ')">Delete</button>';
            })

            // supaya filter search menggunakan nama wali kelas bisa dilakukan
            ->filterColumn('wali_kelas', function($query, $keyword) {
                $query->whereHas('guru', function($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->make(true); // Return data as JSON
    }
}
