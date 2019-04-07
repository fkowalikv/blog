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
            'username' => 'admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
            'last_login' => now(),
            'last_login_ip' => '1.2.3.4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'moderator',
            'email' => 'moderator@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('moderator'),
            'remember_token' => Str::random(10),
            'last_login' => now(),
            'last_login_ip' => '1.2.3.4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'lajtof',
            'email' => 'lajtof@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('lajtof'),
            'remember_token' => Str::random(10),
            'last_login' => now(),
            'last_login_ip' => '1.2.3.4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(App\User::class, 100)->create();
    }
}
