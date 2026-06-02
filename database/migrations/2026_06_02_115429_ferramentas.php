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
			Schema::create('ferramentas', function (Blueprint $table) {
				$table->id();                                           // ID único
				$table->string('title');                                // Título do post
				$table->text('text');                                   // Conteúdo do post
                $table->string('marca')->nullable();                    // Marca (ex: Bosch, Makita)
                $table->string('cor')->nullable();                      
                $table->string('voltagem')->nullable();                 
                $table->string('material')->nullable();                 
                $table->string('garantia')->nullable();
				$table->foreignId('categorias_id')                // Chave estrangeira
					->constrained()                                   // Referencia tabela categorias
					->onDelete('cascade');                            // Deleta posts quando categoria é deletada
				$table->timestamps();                                   // created_at e updated_at
			});
		}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
