<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'lajtof',
            'email' => 'lajtof@example.com',
            'password' => bcrypt('filip123'),
            'access' => '1',
        ]);
    }
}
