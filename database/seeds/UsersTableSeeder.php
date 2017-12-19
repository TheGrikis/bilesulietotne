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
        User::create(array('name' => 'Test1',
                          'email' => 'test1@test.com',
                          'password' => bcrypt('parole'),
                          'role' => 1));
        User::create(array('name' => 'Test2',
                          'email' => 'test2@test.com',
                          'password' => bcrypt('parole'),
                          'role' => 1));
        User::create(array('name' => 'Test3',
                          'email' => 'test3@test.com',
                          'password' => bcrypt('parole'),
                          'role' => 1));
    }
}
