<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalSidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_sidangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug');
            $table->string('draft');
            $table->date('tanggal');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('sesi_id')->constrained('sesis')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('penguji1')->nullable()->constrained('dosens')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('penguji2')->nullable()->constrained('dosens')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('penguji3')->nullable()->constrained('dosens')->onDelete('restrict')->onUpdate('cascade');
            $table->enum('sidang_type', ['internal_judul', 'metode_penelitian', 'tinjauan_pustaka', 'naskah_proposal', 'prosedural', 'kemajuan_penelitian', 'kelayakan_data', 'naskah_skripsi', 'uns']);
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
        Schema::dropIfExists('jadwal_sidangs');
    }
}
