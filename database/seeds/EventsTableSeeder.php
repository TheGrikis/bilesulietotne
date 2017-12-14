<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Event::truncate();
      Event::create(array(
        'id' => 1,
        'name' => 'Pirmā pasakuma nosaukums',
        'description' => 'Mazs apraksts par pirmo pasākumu, max 191 char, par to, kas gaidāms pasākumā.',
        'seat_count' => 1000,
        'date' => '2017-12-25 20:00:00',
        'created_at' => '2017-11-07 16:10:46',
        'updated_at' => '2017-11-07 16:10:46',
        'place_id' => 1 ));
      Event::create(array(
        'id' => 2,
        'name' => 'Dzimšanas dienas koncerts',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor',
        'seat_count' => 2000,
        'date' => '2018-01-05 20:00:00',
        'created_at' => '2017-11-07 16:10:46',
        'updated_at' => '2017-11-07 16:10:46',
        'place_id' => 2 ));
      Event::create(array(
        'id' => 3,
        'name' => 'Watch paint dry!',
        'description' => 'Pirmais visaizraujošākais 2018. gada krāsu festivāls Pāles rajonā',
        'seat_count' => 10000,
        'date' => '2018-02-01 20:00:00',
        'created_at' => '2017-11-07 16:10:46',
        'updated_at' => '2017-11-07 16:10:46',
        'place_id' => 3 ));
      Event::create(array(
        'id' => 4,
        'name' => 'Jaungada sagaidīšanas fests',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor',
        'date' => '2017-12-31 23:59:59',
        'created_at' => '2017-11-07 16:10:46',
        'updated_at' => '2017-11-07 16:10:46',
        'place_id' => 1 ));
    }
}
