<?php

namespace App\Http\Controllers;

use App\Models\KelasModel;
use Illuminate\Http\Request;

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
        return view('kelas.read', $data);
    }

    function insert(Request $request){
        if($request->isMethod('post')){
            $kelas = new KelasModel();
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->save();
            return redirect('/kelas')->with(['message' => 'Data berhasil disimpan']);
        }
    return view('kelas.formCreate');
    }

    function update(Request $request){
        $kelas = KelasModel::find($request->id);
        $data = array(
            "kelas" => $kelas
        );
        if($request->isMethod('post')){
            $kelas = KelasModel::find($request->id);
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->save();
            return redirect('/kelas')->with(['message' => 'Data kelas berhasil diedit']);
        }
        return view('kelas.formEdit', $data);
    }

    function delete(Request $request){
        $kelas = KelasModel::find($request->id);
        $kelas->delete();
        return redirect('/kelas')->with(['message' => 'Data kelas berhasil dihapus']);
    }
}
