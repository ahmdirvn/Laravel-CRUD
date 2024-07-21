<?php

namespace App\Http\Controllers;

use App\Models\SiswaModel;
use Illuminate\Http\Request;

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
        return view('siswa.read', $data);
    }

    function insert(Request $request){

        if($request-> isMethod('post')){
            $siswa = new SiswaModel();
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->kelas = $request->kelas;
            $siswa->agama = $request->agama;
            $siswa->save();
            return redirect('/siswa')->with(['message' => 'Data berhasil disimpan']);
        }
        return view('siswa.formCreate');
    }

    function update(Request $request){
        $siswa = SiswaModel::find($request->id);
        $data = array(
            "siswa" => $siswa
        );

        if($request-> isMethod('post')){
            $siswa->nama = $request->nama;
            $siswa->email = $request->email;
            $siswa->kelas = $request->kelas;
            $siswa->agama = $request->agama;
            $siswa->save();
            return redirect('/siswa')->with(['message' => 'Update Data berhasil disimpan']);
        }
        return view('siswa.formEdit', $data);
    }

    function delete(Request $request){
        $siswa = SiswaModel::find($request->id);
        $siswa->delete();
        return redirect('/siswa')->with(['message' => 'Data berhasil dihapus']);
    }


}

