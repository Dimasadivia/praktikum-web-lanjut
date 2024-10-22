<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($nama = "",$kelas="", $npm="")
    {
        $data = [
            'nama' => 'Dimas Adivia',
            'kelas' => 'C',
            'npm' => '2217051075'
        ];
        return view ('profile',$data);
    }
}