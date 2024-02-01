<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * Este metodo se ejecuta en el momento que se crea la tabla 
     */
    public function up(): void
    {
        // id (pk), title (unique), director, year, genre (null)
        Schema::create('movie', function (Blueprint $table) {
            // Crea una columna de id, bigInt, autoincrement y primary key
            $table->id(); // primary key autoincrement
            // Se crean entre los dos autogenerados mis campos personalizados
            $table->string('title', 60)->unique();
            $table->string('director', 110);
            $table->year('year');
            $table->string('genre', 50)->nullable();
            // Genera dos campos: una de fecha de creacion y otro de ultima modificacion
            $table->timestamps(); // marcas de tiempo
        });
    }

    /**
     * Reverse the migrations.
     * Este metodo se ejecuta en el momento que se elimnina la tabla
     */
    public function down(): void
    {
        Schema::dropIfExists('movie');
    }
};
