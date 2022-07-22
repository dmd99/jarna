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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_type')->nullable();
            $table->string('slug')->unique();
            $table->string('sku');
            $table->string('product_image')->nullable();

            $table->integer('product_details_id')->unsigned()->nullable();
            $table->foreign('product_details_id')->references('id')
                ->on('product_details')->onDelete('cascade');

            $table->float('price')->nullable();
            $table->float('discount_price')->nullable();

            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')
                ->on('units')->onDelete('cascade');


            $table->enum('status', ['published', 'unpublished', 'featured'])
                ->default('unpublished')->nullable();

            $table->integer('shop_id')->unsigned()->nullable();
            $table->foreign('shop_id')->references('id')
                ->on('shops')->onDelete('cascade');

            $table->integer('tax_id')->unsigned()->nullable();
            $table->foreign('tax_id')->references('id')
                ->on('taxes')->onDelete('cascade');

            $table->integer('product_views')->default(0)->nullable();
            $table->boolean('is_featured')->default(false)->nullable();



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
        Schema::dropIfExists('products');
    }
};
