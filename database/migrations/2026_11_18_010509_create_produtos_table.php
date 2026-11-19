<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table): void {
            $table->id();
            $table->string('nome', 150);
            $table->text('descricao');
            $table->string('categoria', 100);
            $table->decimal('preco', 10, 2);
            $table->unsignedInteger('quantidade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
