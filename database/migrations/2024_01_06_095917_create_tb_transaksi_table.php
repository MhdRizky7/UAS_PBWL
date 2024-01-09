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
      Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->bigIncrements('transaksi_id');
            $table->unsignedBigInteger('transaksi_pelanggan_id');
            $table->unsignedBigInteger('transaksi_produk_id');
            $table->integer('transaksi_jumlah');
            $table->decimal('transaksi_total_harga', 10, 2);
            $table->timestamp('transaksi_tanggal', Date);
            $table->string('status_pembayaran', 50);
            $table->timestamps();

            
            $table->index('transaksi_pelanggan_id', 'pelanggann');
            $table->index('transaksi_produk_id', 'produkk');

    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
