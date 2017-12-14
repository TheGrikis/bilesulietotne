<?php

use App\Place;
use Illuminate\Database\Seeder;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Place::truncate();
        Place::create(array(
          'id' => 1,
          'name' => '11. novembra krastmala',
          'lat' => 56.9493099,
          'long' => 24.1009177));
        Place::create(array(
          'id' => 2,
          'name' => 'Arēna Rīga',
          'lat' => 56.968233,
          'long' => 24.120573));
        Place::create(array(
          'id' => 3,
          'name' => 'Pāles novads',
          'lat' => 57.701627,
          'long' => 24.663800));
        Place::create(array(
          'id' => 4,
          'name' => 'Lucavsala',
          'lat' => 56.925865,
          'long' => 24.120038));
    }
}
