<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function events() {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }
}
