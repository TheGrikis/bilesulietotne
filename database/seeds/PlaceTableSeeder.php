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
        Place::create(array(
          'id' => 5,
          'name' => 'Latvijas universitāte',
          'lat' => 56.950572,
          'long' => 24.115798));
        Place::create(array(
          'id' => 6,
          'name' => 'Brīvības piemineklis',
          'lat' => 56.951435,
          'long' => 24.113230));
        Place::create(array(
          'id' => 7,
          'name' => 'Vērmanes dārzs',
          'lat' => 56.951133,
          'long' => 24.118895));
    }
}
