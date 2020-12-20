<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public $primaryKey = 'id';

    protected $table = 'address';

    const CREATED_AT = 'created_at';

    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'jalan',
        'provinsi',
        'kota',
        'kode_pos'
    ];
}
