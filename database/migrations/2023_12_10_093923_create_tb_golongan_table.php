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
   Schema::create('tb_golongan', function (Blueprint $table) {
        $table->tinyIncrements('gol_id');
        $table->string('gol_kode', 10)->unique();
        $table->string('gol_nama', 50);
        $table->timestamps();
        $table->softDeletes();
    });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_golongan');
    }
};
