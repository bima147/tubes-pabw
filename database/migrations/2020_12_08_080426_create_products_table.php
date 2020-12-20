<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->text('deskripsi');
            $table->double('stok');
            $table->double('berat');
            $table->double('harga');
            $table->string('gambar_1')->nullable();
            $table->string('gambar_2')->nullable();
            $table->string('gambar_3')->nullable();
            $table->unsignedBigInteger('cat_id');
            $table->foreign('cat_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
