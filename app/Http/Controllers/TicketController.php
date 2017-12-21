<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ticket;
use App\Event;
use App\Notification;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $address="";
        $abi="";
        $exists = Storage::disk('public')->exists('blockchain/build/contracts/Festival.json');
        if ($exists){
          $content = Storage::disk('public')->get('blockchain/build/contracts/Festival.json');
          $json=json_decode($content, true);
          $abi = json_encode($json['abi']);
          $networks = $json['networks'];
          foreach ($networks as $key => $val)
            $address = $val['address'];
        }

        $tickets2=array();
        for($i=0; $i<3; $i++) {
          $ticket = new Ticket();
          $ticket->updated_at = "2017-12-21 11:56:00";
          $ticket->events()->associate(Event::find(4));
          $ticket->id = $i+100;
          $ticket->type = $i;
          $tickets2[]=$ticket;
        }

        return view('tickets', array(
          'tickets' => Ticket::where('user_id', Auth::user()->id)->get(),
          'tickets2' => $tickets2,
          "abi" => $abi, "address" => $address
       ));
    }

    public function show($ticket_id){
        //dd(Ticket::findOrFail($ticket_id)->event_id);
      if ($ticket_id<100)
          return view('ticket',
               compact('ticket_id'),
               array('tick' => Ticket::findOrFail($ticket_id),
                  'notifications' => Notification::where('event_id', Ticket::findOrFail($ticket_id)->event_id)->get(),
                  "abi" => "", "address" => "")
                  //'noti' => Notification::where('event_id', Ticket::findOrFail($ticket_id)->event_id)->first())
          );
      else{
          $ticket = new Ticket();
          $ticket->updated_at = "2017-12-21 11:56:00";
          $ticket->events()->associate(Event::find(4));
          $ticket->id = $ticket_id;
          $ticket->type = $ticket_id-100;
          $tickets2[]=$ticket;

          $address="";
          $abi="";
          $exists = Storage::disk('public')->exists('blockchain/build/contracts/Festival.json');
          if ($exists){
            $content = Storage::disk('public')->get('blockchain/build/contracts/Festival.json');
            $json=json_decode($content, true);
            $abi = json_encode($json['abi']);
            $networks = $json['networks'];
            foreach ($networks as $key => $val)
              $address = $val['address'];
          }

          return view('ticket',
             compact('ticket_id'),
             array('tick' => $ticket,
                'notifications' => Notification::where('event_id', 4),
                "abi" => $abi, "address" => $address)
          );

      }
    }
}
