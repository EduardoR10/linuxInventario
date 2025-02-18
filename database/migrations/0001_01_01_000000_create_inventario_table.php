<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45);
            $table->string('ubicacion', 45);
            $table->timestamps();
        });

        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->string('nombrecorto', 45);
            $table->string('descripcion', 45);
            $table->string('serie', 45);
            $table->string('color', 45);
            $table->string('fechaadquisicion', 45);
            $table->string('observaciones', 45)->nullable();
            $table->unsignedBigInteger('areas_id');
            $table->foreign('areas_id')->references('id')->on('areas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inventario');
        Schema::dropIfExists('areas');
    }
};
