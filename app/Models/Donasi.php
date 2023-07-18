<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;
    protected $guarded = [];

public function daftar(){
    return $this->belongsTo(DaftarDonasi::class, 'daftar_donasi_id');
}
public function user(){
    return $this->belongsTo(User::class);
}
}
