<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_product_id')->unsigned();
            $table->foreign('event_product_id')->references('id')->on('event_products');
            $table->bigInteger('cashier_user_id')->unsigned();
            $table->bigInteger('stock_user_id')->unsigned();
            $table->foreign('cashier_user_id')->references('id')->on('users');
            $table->foreign('stock_user_id')->references('id')->on('users');
            $table->double('quantity')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('stock_logs');
    }
}
