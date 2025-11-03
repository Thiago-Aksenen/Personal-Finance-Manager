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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoincrement();
            $table->string('nome', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('sexo', 1)->nullable();
            $table->string('telefone', 15)->nullable();
            $table->string('descricao', 200)->nullable();
            $table->timestamp('data_cadastro')->useCurrent();
            $table->datetime('data_nascimento')->nullable();
            $table->boolean('is_notificada')->default(false);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
