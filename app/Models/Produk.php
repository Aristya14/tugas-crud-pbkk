<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $guarded = [];
    protected $fillable = 
     [
        'Nama',
        'Deskripsi',
        'Quantity',
        'Expired',
        'gambar'
     ];

     public function produkdetail()
     {
         return $this->hasOne(ProdukDetail::class);
     }

}
