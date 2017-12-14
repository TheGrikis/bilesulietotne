<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(array('name' => 'Administrator',
                           'email' => 'admin@test.com',
                           'password' => bcrypt('secret'),
                           'role' => 2));
        User::create(array('name' => 'Test',
                          'email' => 'test@test.com',
                          'password' => bcrypt('parole'),
                          'role' => 1));
    }
}
