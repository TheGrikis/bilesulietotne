<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function images() {
        return array(
            'server_path' => public_path().'/uploads/',
            'asset_path' => 'uploads/',
            'image_small' => $this->id.'_small.png',
            'image_large' => $this->id.'_large.png',
        );
    }

    public function places() {
        return $this->belongsTo('App\Place', 'place_id', 'id');
    }

    public function notifications() {
        return $this->hasMany('App\Notification');
    }
}
