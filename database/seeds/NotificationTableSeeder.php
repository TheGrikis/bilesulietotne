<?php

use App\Notification;
use Illuminate\Database\Seeder;

class NotificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Notification::truncate();
        Notification::create(array(
            'id' => 1,
            'event_id' => 1,
            'notification' => 'Something new!'));
        Notification::create(array(
            'id' => 2,
            'event_id' => 1,
            'notification' => 'Something less new!'));
        Notification::create(array(
            'id' => 3,
            'event_id' => 1,
            'notification' => 'Something older!'));
        Notification::create(array(
            'id' => 4,
            'event_id' => 1,
            'notification' => 'Something very old!'));
    }
}
