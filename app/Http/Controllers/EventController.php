<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(){
      return view('events', array('events' => Event::orderBy('date')->get()));
    }

    public function show($id){

    	$event=Event::where('id', $id)->first();
		$contractname=$event->contractname;



		$address="";
		$abi="";
		$exists = Storage::disk('public')->exists('blockchain/build/contracts/'.$contractname.'.json');
		if ($exists){
			$content = Storage::disk('public')->get('blockchain/build/contracts/'.$contractname.'.json');
			$json=json_decode($content, true);
			$abi = json_encode($json['abi']);
			$networks = $json['networks'];
			foreach ($networks as $key => $val)
				$address = $val['address'];
		}

    	return view('event', array('event' => Event::where('id', $id)->first(), "abi" => $abi, "address" => $address));
    }
}
