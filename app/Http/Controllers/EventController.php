<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
      return view('events', array('events' => Event::orderBy('date')->get()));
    }
}
