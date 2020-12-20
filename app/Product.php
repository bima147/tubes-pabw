<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $primaryKey = 'id';

    protected $table = 'products';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'stok',
        'berat',
        'harga',
        'gambar_1',
        'gambar_2',
        'gambar_3',
        'cat_id'
    ];
}
