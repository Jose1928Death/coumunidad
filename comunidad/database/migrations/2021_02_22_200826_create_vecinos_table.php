<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVecinosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vecinos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',40);
            $table->string('apellidos',120);
            $table->string('email',100)->unique();
            $table->string('foto')->default('/storage/img/default.png');
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
        Schema::dropIfExists('vecinos');
    }
}
