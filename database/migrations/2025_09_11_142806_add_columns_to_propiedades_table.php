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
        Schema::table('propiedades', function (Blueprint $table) {
            $table->string('titulo');
            $table->foreignId('tipo_id')->constrained('tipos_propiedades')->onDelete('cascade'); // relación con la tabla de tipos
            $table->integer('precio');
            $table->text('descripcion');
            $table->integer('banos');
            $table->integer('habitaciones');
            $table->integer('superficie');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('imagen'); // portada
            $table->json('imagenes')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propiedades', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['tipo_id']);
            $table->dropColumn([
                'titulo', 'tipo_id', 'precio', 'descripcion',
                'banos', 'habitaciones', 'superficie',
                'direccion', 'ciudad', 'provincia',
                'imagen', 'imagenes', 'user_id'
            ]);
        });
    }
};
