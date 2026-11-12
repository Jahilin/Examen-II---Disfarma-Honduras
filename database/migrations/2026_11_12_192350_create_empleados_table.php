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
        Schema::create('empleados', function (Blueprint $table) {
        $table->id();
        $table->string('identidad', 13)->unique();
        $table->string('nombre', 100);
        $table->string('apellido', 100);
        $table->string('correo', 150);
        $table->string('cargo', 50);
        $table->decimal('salario', 10, 2);
        $table->date('fecha_ingreso');
        $table->string('estado', 10)->default('Activo');
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
