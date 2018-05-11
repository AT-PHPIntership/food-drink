<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('product_id');
            $table->integer('quantity');
            $table->float('price', 8, 2);	
            $table->string('preview');
            $table->string('address');
            $table->string('name_product');
            $table->string('image');
            $table->foreign('order_id')
                    ->references('id')->on('orders')
                    ->onDelete('cascade');
            $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.shww
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
