<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class RiwayatDonasiController extends Controller
{
    public function index(){
        return \view('riwayat-donasi.index',[
            'riwayat' => Donasi::all()
        ]);
    }
}
