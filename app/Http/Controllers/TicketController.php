<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('tickets', array(
          'tickets' => Ticket::where('user_id', Auth::user()->id)->get()
       ));
    }

    public function show($ticket_id){
        return view('ticket',
             compact('ticket_id'),
             array('tick' => Ticket::findOrFail($ticket_id))
        );
    }
}
