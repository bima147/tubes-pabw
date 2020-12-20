<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])
                ->default('pending');
            $table->decimal('total_harga', 20, 6);
            $table->boolean('status_pembayaran')->default(1);
            $table->string('metode_pembayaran')->nullable();
            $table->string('no_resi');
            $table->string('ekspedisi');
            $table->unsignedBigInteger('alamat_id');
            $table->foreign('alamat_id')
                ->references('id')
                ->on('address')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('orders');
    }
}
