<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelayakanDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelayakan_data', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('draft');
            $table->date('tanggal');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('sesi_id')->constrained('sesis')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('ruangan_id')->constrained('sesis')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak', 'revisi'])->default('menunggu');
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
        Schema::dropIfExists('kelayakan_data');
    }
}
