<?php

namespace App\Http\Controllers;

use App\Models\DaftarDonasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function kirimDonasi(Request $request){
        $daftardonasi = DaftarDonasi::find($request->id_daftar_donasi);

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
        $payload = [
            'transaction_details' => [
               'order_id' => 'SANDBOX-' . \uniqid(),
               'gross_amount' => $request->jumlah_donasi,
            ],
            'customer_details' => [
               'first_name' =>  Auth::user()->name,
               'email' => Auth::user()->email
            ],
            'item_details' => [
               [
                  'id' => $daftardonasi->id,
                  'price' => $request->jumlah_donasi,
                  'quantity' => 1,
                  'name' => $daftardonasi->judul
               ]
            ]
         ];
   
         $snapToken = \Midtrans\Snap::getSnapToken($payload);
         $response = [
            'idDonasi'=>$daftardonasi->id,
            'snapToken'=>$snapToken
         ];
         return $response;
    }
}
