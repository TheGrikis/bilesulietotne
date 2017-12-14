<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function events() {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }

    public function users() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
