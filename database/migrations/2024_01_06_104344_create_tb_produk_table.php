<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
 public function up()
    {
  Schema::create('tb_produk', function (Blueprint $table) {
            $table->id('produk_id'); 
            $table->unsignedBigInteger('produk_pelanggan_id'); 
            $table->string('produk_nama'); 
            $table->text('produk_deskripsi')->nullable(); 
            $table->decimal('produk_harga', 10, 2); 
            $table->integer('produk_stok');
            $table->string('kategori', 50); 
            $table->timestamps(); 
            
           
            $table->foreign('produk_pelanggan_id')->references('pel_id')->on('tb_pelanggan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_produk');
    }
};
