<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('qr_code', 500);
            $table->string('image_path')->nullable();
            $table->bigInteger('event_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->default(1);
            $table->foreign('event_id')->on('events')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
            $table->enum('status', ['available', 'in', 'out', 'canceled']);
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
        Schema::dropIfExists('tickets');
    }
}
