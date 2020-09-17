<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGuestToEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            //
            $table->integer('regular_qty')->after('ticket_qty')->default(0);
            $table->double('regular_price', 14, 4)->after('regular_qty')->default(0);
            $table->integer('vip_qty')->after('regular_price')->default(0);
            $table->double('vip_price', 14, 4)->after('vip_qty')->default(0);
            $table->integer('guest_qty')->after('vip_price')->default(0);
            $table->double('guest_price', 14, 4)->after('guest_qty')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            //
        });
    }
}
