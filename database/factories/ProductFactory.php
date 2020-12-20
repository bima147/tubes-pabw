<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'nama_barang' => $faker->word(),
        'deskripsi' => $faker->text(120),
        'stok' => $faker->numberBetween(1, 999),
        'berat' => $faker->numberBetween(0, 5),
        'harga' => $faker->numberBetween(10000, 100000),
        'gambar_1' => '',
		'gambar_2' => '',
		'gambar_3' => '',
		'cat_id' => $faker->numberBetween(1, 10),
    ];
});
