<?php

namespace App\Http\Controllers;

use App\Models\DaftarDonasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index(){
        return \view('member.donasi.index',[
            'donasis' => DaftarDonasi::latest()->filter(\request(['cari','kat']))->paginate(4)->withQueryString(),
            'kategoris' => Kategori::all()
        ]);
    }

    public function show(DaftarDonasi $daftardonasi){
       return \view('member.donasi.donasi',[
        'donasi' => $daftardonasi
       ]);
    }
}
