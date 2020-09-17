<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'emmanuel',
                    'email' => 'emmanuel@vitoo.com',
                    'password' => '$2y$10$BMubUDWNnqQRNs1iCpXecuR/TMz2I5rZKcveLG1JkcI8WtHBMno7a',
                    'phone_number' => '+50937396810',
                    'sexe' => 'Male',
                    'status' => 1,
                    'created_at' => '2020-03-06 15:17:26',
                    'updated_at' => '2020-03-06 17:07:12',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'Castor',
                    'email' => 'castor@vitoo.com',
                    'password' => '$2y$10$65AGUXo/sEhXALVPrCi0p.iUaPW8HNz3Vstl3D36J4mmSDpZY5GUy',
                    'phone_number' => '+50937396810',
                    'sexe' => 'Male',
                    'status' => 1,
                    'created_at' => '2020-03-06 15:17:26',
                    'updated_at' => '2020-03-06 17:07:12',
                ),
        ));
    }
}
