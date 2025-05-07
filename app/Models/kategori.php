<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];
    public function produk(): HasMany
    {
        return $this->hasMany(Produk::class,);
    }
}
