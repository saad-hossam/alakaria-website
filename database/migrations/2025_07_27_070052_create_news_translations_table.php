<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_translations', function (Blueprint $table) {
            $table->id();
             $table->foreignId('news_id')->constrained()->onDelete('cascade');
    $table->string('locale')->index();
    $table->string('name');
    $table->text('description')->nullable();
    $table->longText('body')->nullable();
    $table->unique(['news_id', 'locale']);
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
        Schema::dropIfExists('news_translations');
    }
};
