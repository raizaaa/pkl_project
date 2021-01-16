<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_negara')->constrained('negaras')->onUpdate('cascade')->onDelete('cascade');
            $table->String('jumlah_positif');
            $table->String('jumlah_meninggal');
            $table->String('jumlah_sembuh');
            $table->date('tanggal');
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
        Schema::dropIfExists('kasuses');
    }
}
