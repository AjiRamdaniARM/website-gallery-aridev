<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(Request $request) {
        $dataCategory = category::all();
        return view('profile.upload',['user' => $request->user(),], compact('dataCategory'));
    }

        public function store(Request $request) {

          $request->validate([
            'judulFoto' => ['required'],
            'deskripsiFoto' => ['required'],
            'categoryID' => ['required'],
            'id' => ['required'],
        ]);

        $foto_file = $request->file('lokasiFile');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('ymdhis') ."." . $foto_ekstensi;
        $foto_file->move(public_path('image'), $foto_nama);

        $data = [
            'judulFoto' => $request->judulFoto,
            'deskripsiFoto' => $request->deskripsiFoto,
            'categoryName' => $request->categoryID,
            'id' => $request->id,
            'lokasiFile' => $foto_nama,
        ];

       Foto::create($data);
          return redirect('/dataImage')->with('success', 'Employee Addedd!');
    }


}
