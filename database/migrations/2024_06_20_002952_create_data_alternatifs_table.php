<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAlternatifsTable extends Migration
{
    public function up()
    {
        Schema::create('data_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->integer('C1');
            $table->integer('C2');
            $table->integer('C3');
            $table->integer('C4');
            $table->integer('C5');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_alternatifs');
    }
}
