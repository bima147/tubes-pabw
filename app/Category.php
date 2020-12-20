<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $primaryKey = 'id';

    protected $table = 'categories';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'nama_kategori'
    ];
}
