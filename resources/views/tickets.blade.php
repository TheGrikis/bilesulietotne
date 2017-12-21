@extends('layouts.app')

@section('content')
<div class="container my-3">
      <div class="row">
        <!--div class="col-xs-12 col-sm-12 col-md-8 col-lg-4"-->
            @foreach ( $tickets as $key => $tick )
                @include('inc.ticket_preview', ['tick' => $tick, 'count' => $key])
            @endforeach
            @foreach ( $tickets2 as $key => $tick )
                @include('inc.ticket_preview', ['tick' => $tick, 'count' => $key])
            @endforeach
        <!--/div-->
      </div>
</div>
@endsection

@section('scripts')
<script>

    {!! $abi= $abi ? $abi: 0 !!}

    var contractAbi={!! $abi !!};
    var contractAddress = "{!! $address !!}";

    if (contractAbi && contractAddress){
    	var contract = web3.eth.contract(contractAbi).at(contractAddress);

	    for (var i=0; i<3; i++){
	    	ticketcount = contract.myTicketsCount.call(i, {from: "{!! Auth::user()->ethwallet !!}"});
	    	if (parseInt(ticketcount)<=0)
	    		$( "#No"+(100+i) ).remove();
	    	else {
	    		$( "#No"+(100+i) ).find("#ticketcounttext").text("Skaits");
	    		$( "#No"+(100+i) ).find("#ticketcount").text(ticketcount);
	    		$( "#No"+(100+i) ).find("#typetext").text(contract.ticketTypes(i)[0].toString());
	    		$( "#No"+(100+i) ).find("#type").text(ticketcount);
	    	}
		}
	}

</script>
@endsection
