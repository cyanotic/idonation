<?php

namespace App\Http\Controllers;

use App\Models\DaftarDonasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarDonasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('daftar-donasi.index',[
            'donasis' => DaftarDonasi::all()
          ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('daftar-donasi.create',[
            'kategoris' => Kategori::all()
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:1024'
        ]);
        if($request->file('foto')){
            $validateData['foto'] = $request->file('foto')->store('foto-donasi');
        }
        DaftarDonasi::create($validateData);
        return \redirect('/dashboard/daftar-donasi')->with('alert', 'Data Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaftarDonasi  $daftarDonasi
     * @return \Illuminate\Http\Response
     */
    public function show(DaftarDonasi $daftarDonasi)
    {
      \dd($daftarDonasi);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarDonasi  $daftarDonasi
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarDonasi $daftarDonasi)
    {
        return \view('daftar-donasi.edit',[
            'daftar' => $daftarDonasi,
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarDonasi  $daftarDonasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarDonasi $daftarDonasi)
    {
        $validateData = $request->validate([
            'judul' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|file|max:1024'
        ]);
        if($request->file('foto')){
            if($request->foto_lama != 'default.jpg'){
                Storage::delete($request->foto_lama);
            }
            $validateData['foto'] = $request->file('foto')->store('foto-donasi');
        }
        DaftarDonasi::where('id',$daftarDonasi->id)->update($validateData);
        return \redirect('/dashboard/daftar-donasi')->with('alert', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaftarDonasi  $daftarDonasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaftarDonasi $daftarDonasi)
    {
        if($daftarDonasi-> foto != 'default.jpg'){
            Storage::delete($daftarDonasi->foto);
        }
       DaftarDonasi::destroy($daftarDonasi->id);
       return \redirect('/dashboard/daftar-donasi')->with('alert', 'Data Berhasil Dihapus');
    }
}
