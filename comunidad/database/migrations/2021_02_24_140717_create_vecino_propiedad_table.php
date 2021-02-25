<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVecinoPropiedadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vecino_propiedad', function (Blueprint $table) {
            $table->id();
            $table->decimal('presupuesto',4,2)->nullable();
            $table->foreignId('vecino_id');
            $table->foreignId('propiedad_id');
            $table->timestamps();

            $table->foreign('vecino_id')
            ->references('id')
            ->on('vecinos')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('propiedad_id')
            ->references('id')
            ->on('propiedads')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vecino_propiedad');
    }
}
