<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('disk', function (Blueprint $table) {
            $table->id();
            // Declaramos el campo que hará referencia a clave foránea
            $table->foreignId("idartist");
            $table->string('title', 60);
            $table->integer('year')->nullable();
            // Creamos el campo para guardar la portada del disco
            $table->binary('cover')->nullable();
            $table->timestamps();
            
            // Definimos la clave foránea
            $table->foreign('idartist')->references('id')->on('artist')->onUpdate('cascade')->onDelete('cascade');
            // Hacemos uan restriccion para que un mismo artista no tenga dos discos con el mismo nombre
            $table->unique(['idartist', 'title']);
        });
        
        // Vamos a cambiar el tipo del campo cover para subir fotos mas grandes
        $sql = 'alter table disk change cover cover longblob';
        //las migraciones de Laravel no ofrecen el tipo longblob
        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disk');
    }
};
