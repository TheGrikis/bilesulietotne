<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class MapController extends Controller
{
    public function index(){
        return view('map', array(
          'events' => Event::all()
        ));
    }
}
