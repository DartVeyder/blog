<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('language_id')->nullable();

            $table->index('language_id' , 'category_language_idx');
            $table->index('category_id' , 'category_category_description_idx');

            $table->foreign('category_id', 'category_category_description_fk')->on('categories')->references('id');
            $table->foreign('language_id', 'category_language_fk')->on('languages')->references('id');
            
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
        Schema::dropIfExists('category_descriptions');
    }
}
