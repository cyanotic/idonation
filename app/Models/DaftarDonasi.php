<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarDonasi extends Model
{
    use HasFactory;
    protected $guarded = [];
    //untuk mencari dari yg sering digunkan scope wajib belakang nya bebas
    public function scopeFilter($query, array $filters)
    {
        //jika ada didalm array filters 'search' ambil search nya lakukan query
        //dibawah ini sudah benar tp mau lebih simple lagi pakai when  
        // if(isset($filters['search']) ? $filters['search'] : false){
        //   return  $query->where('title', 'like', '%' . $filters['search'] . '%');
        // }

        //isset($filters['search']) ? $filters['search'] : false = $filters['search'] ?? false
        $query->when($filters['cari'] ?? false, function ($query, $cari) {
            return  $query->where('judul', 'like', '%' . $cari . '%');
        });

        $query->when($filters['kat'] ?? false, function ($query, $kategori) {
            return $query->whereHas('kategori', function ($query) use ($kategori) {
                $query->where('id', $kategori);
            });
        });
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
