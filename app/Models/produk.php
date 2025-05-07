<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stock',
        'nama_file',
        'kategori_id'
    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(kategori::class);
    }
}
