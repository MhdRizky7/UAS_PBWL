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
        Schema::create('tb_pelanggan', function (Blueprint $table) {
        $table->increments('pel_id');
        $table->unsignedTinyInteger('pel_id_gol'); 
        $table->string('pel_no', 20)->unique();
        $table->string('pel_nama', 50);
        $table->text('pel_alamat');
        $table->string('pel_hp', 20);
        $table->string('pel_ktp', 50);
        $table->string('pel_seri', 50);
        $table->integer('pel_meteran');
        $table->enum('pel_aktif', ['Y', 'N']);
        $table->bigInteger('pel_id_user');
        $table->timestamps();
        $table->softDeletes();

        $table->foreign('pel_id_user')->references('users')->on('users');
        $table->foreign('pel_id_gol')->references('gol_id')->on('tb_golongan');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_pelanggan');
    }
};
