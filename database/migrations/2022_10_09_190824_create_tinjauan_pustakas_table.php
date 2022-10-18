<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinjauanPustakasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinjauan_pustakas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('draft');
            $table->date('tanggal');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('sesi_id')->constrained('sesis')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('ruangan_id')->constrained('sesis')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('tinjauan_pustakas');
    }
}
