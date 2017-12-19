<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BlockchainController extends Controller
{

	public function index(){
    	return view('addwallets');
    }

    public function store(Request $request)
    {
        $data = $request->all();

		$c=User::count();
		if ($c>10)
			$c=10;
		$users = User::take($c)->get();

		$i=0;
		foreach ($users as $user) {
		    $user->update([ 'ethwallet'=>$data['wallet'][$i] ]);
		    $i++;
		}
		return redirect()->to('/');
    }
}
