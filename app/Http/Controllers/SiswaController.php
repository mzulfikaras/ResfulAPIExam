<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(){
        return Siswa::all();
    }

    public function create(Request $request){
        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->alamat = $request->alamat;

        $siswa->save();

        return "data berhasil disimpan";
    }

    public function update(Request $request, $id){
        $nama = $request->nama;
        $alamat = $request->alamat;

        $siswa = Siswa::find($id);
        $siswa->nama = $nama;
        $siswa->alamat = $alamat;

        $siswa->save();

        return "data berhasil di update";

    }

    public function delete($id){
        $siswa = Siswa::find($id);
        $siswa->delete();

        return "data berhasil di delete";
    }

}
