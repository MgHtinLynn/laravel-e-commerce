<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->double('price')->default(0);
            $table->string('item_model')->nullable();
            $table->longText('description')->nullable();
            $table->text('image_url')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->boolean('is_available')->default(false);
            $table->timestamps();
            $table->softDeletes();
            //foreign key
            $table->foreign('category_id')->references('id')->on('categories');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
