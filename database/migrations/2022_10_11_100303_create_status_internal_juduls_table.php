<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusInternalJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_internal_juduls', function (Blueprint $table) {
            $table->id();
            $table->enum('status_dospem1', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->enum('status_dospem2', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->foreignId('internal_judul_id')->constrained('internal_juduls')->onDelete('restrict')->onUpdate('cascade');
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
        Schema::dropIfExists('status_internal_juduls');
    }
}
