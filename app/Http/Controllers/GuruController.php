<?php

namespace App\Http\Controllers;

use App\Models\GuruModel;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    function index(){
        $data = array(
            "gurus" => GuruModel::all()
        );
        return view('guru.list', $data);
    }

    function insert(Request $request){

        if($request-> isMethod('post')){
            $guru = new GuruModel();
            $guru->nama = $request->nama;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->kelas = $request->kelas;
            $guru->save();
            return redirect('/guru')->with(['message' => 'Data berhasil disimpan']);
        }
        return view('guru.form');
    }

    function update(Request $request){
        $guru = GuruModel::find($request->id);
        $data = array(
            "siswa" => $guru
        );

        if($request-> isMethod('post')){
            $guru->nama = $request->nama;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->kelas = $request->kelas;
            $guru->save();
            return redirect('/guru')->with(['message' => 'Update Data berhasil disimpan']);
        }
        return view('guru.form', $data);
    }

    function delete(Request $request){
        $guru = GuruModel::find($request->id);
        $guru->delete();
        return redirect('/guru')->with(['message' => 'Data berhasil dihapus']);
    }

}
