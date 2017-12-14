<?php

use App\Ticket;
use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();
        Ticket::create(array(
          'id' => 1,
          'seat' => 199,
          'row' => 2,
          'sector' => 'A10',
          'event_id' => 1,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 2,
          'seat' => 12,
          'row' => 2,
          'sector' => '5',
          'event_id' => 3,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 3,
          'seat' => 53,
          'row' => 2,
          'sector' => 'C',
          'event_id' => 2,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 4,
          'event_id' => 4,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 5,
          'seat' => 43,
          'event_id' => 5,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 6,
          'event_id' => 6,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 7,
          'event_id' => 7,
          'user_id' => 2));
        Ticket::create(array(
          'id' => 8,
          'event_id' => 8,
          'user_id' => 2));
    }
}
