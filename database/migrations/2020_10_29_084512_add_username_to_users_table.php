<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//use Faker\Generator as Faker;
use Faker\Factory as factory;
use Illuminate\Support\Str;

class AddUsernameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //

//            $factory = \Faker\Factory::create();
//            $fakeUserName = $factory->userName;
////            dd($fakeUserName);\Faker\Factory::create();
////            $fakeUserName = $factory->userName;
//////            dd($fakeUserName);
            $table->string('username')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
