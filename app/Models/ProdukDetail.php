<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'pabrik',
        'bahan',
        'kategori',
    ];
    public function Produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
