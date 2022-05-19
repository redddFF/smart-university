<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_works', function (Blueprint $table) {
            $table->id();
            $table->string('titre_paperwork');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('paperwork');
            $table->string('url_paperwork') ;           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paper_works');
    }
};
