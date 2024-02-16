<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Foto;
use App\Models\Likefoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    function index(Request $request) {
        // === Dapatkan ID pengguna yang sedang login === //
        $user_id = Auth::id();
        // === Dapatkan data dari database berdasarkan ID pengguna yang sedang login === //
        $data = User::where('id', $user_id)->get();
        $dataImage = Foto::where('id', $user_id)->get();
        return view('profile.dataImage',['user' => $request->user()], compact('dataImage','data'));
    }
}
