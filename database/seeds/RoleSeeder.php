<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Administrator',
                    'created_at' => '2020-03-06 15:17:26',
                    'updated_at' => '2020-03-06 17:07:12',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Agent_out',
                    'created_at' => '2020-03-06 17:06:15',
                    'updated_at' => '2020-03-06 17:06:15',
                ),
            2 =>
                array (
                    'id' => 3,
                    'name' => 'Agent_in',
                    'created_at' => '2020-04-04 15:09:16',
                    'updated_at' => '2020-04-04 15:09:16',
                ),
            3 =>
                array (
                    'id' => 4,
                    'name' => 'Supervisor',
                    'created_at' => '2020-04-04 15:09:16',
                    'updated_at' => '2020-04-04 15:09:16',
                ),
            4 =>
                array (
                    'id' => 5,
                    'name' => 'Bar',
                    'created_at' => '2020-04-04 15:09:16',
                    'updated_at' => '2020-04-04 15:09:16',
                ),
            5 =>
                array (
                    'id' => 6,
                    'name' => 'Regular',
                    'created_at' => '2020-04-04 15:09:16',
                    'updated_at' => '2020-04-04 15:09:16',
                ),
        ));
    }
}
