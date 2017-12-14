-<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      $this->call(UsersTableSeeder::class);
      $this->call(EventsTableSeeder::class);
      $this->call(PlaceTableSeeder::class);
      $this->call(TicketTableSeeder::class);
      $this->call(NotificationTableSeeder::class);
      DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
