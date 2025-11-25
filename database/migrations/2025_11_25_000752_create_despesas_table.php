<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->enum('categoria', ['contas', 'alimentacao', 'transporte', 'compras', 'outro']);
            $table->decimal('valor', total: 8, places: 2);
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('despesas');
    }
};
