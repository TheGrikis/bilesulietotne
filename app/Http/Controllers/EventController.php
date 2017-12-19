<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
      return view('events', array('events' => Event::orderBy('date')->get()));
    }

    public function show($id){
      return view('event', array('event' => Event::where('id', $id)->first()));
    }
}
