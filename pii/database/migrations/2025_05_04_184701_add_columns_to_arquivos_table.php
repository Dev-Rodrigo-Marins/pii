<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('arquivos', function (Blueprint $table) {
            $table->string('arquivo');
            $table->string('categoria');
            $table->string('anexo');
        });
    }
    
    public function down()
    {
        Schema::table('arquivos', function (Blueprint $table) {
            $table->dropColumn(['arquivo', 'categoria', 'anexo']);
        });
    }
};
