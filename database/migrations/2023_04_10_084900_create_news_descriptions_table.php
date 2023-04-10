<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('text');
            $table->unsignedBigInteger('language_id')->nullable();
            $table->unsignedBigInteger('news_id');

            $table->index('language_id' , 'news_language_idx');
            $table->index('news_id' , 'news_news_description_idx');

            $table->foreign('news_id', 'news_news_description_fk')->on('news')->references('id');
            $table->foreign('language_id', 'news_language_fk')->on('languages')->references('id');
            
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
        Schema::dropIfExists('news_descriptions');
    }
}
