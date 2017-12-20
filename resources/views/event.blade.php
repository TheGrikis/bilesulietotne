@extends('layouts.app')
@section('content')
<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8">
      <div class="card">
          <div class="card-body text-white text-center">
              <h4 class="card-title">{{ $event->name }}</h4>
              <h6 class="card-subtitle mb-2 text-muted">{{ $event->description }}</h6>
              <p class="card-text"></p>
              <img class="img-fluid" src="{{ asset( $event->images()['asset_path'].$event->images()['image_large'] ) }}" alt="">
              <div class="">
          </div>
          <div class="card-footer">
            <div class="row">
                <div class="col-12 text-center">
                    <strong class="info-text">{{$event->places->name}}</strong>
                </div>
                <div class="col-12 text-center">
                  <strong class="info-text">{{date('d/m/Y', strtotime($event->date))}}</strong>
                  <strong class="info-text">{{date('h:t', strtotime($event->date))}}</strong>
                </div>
            </div>
            <div id="ticketType"></div>
            <div id="remaining"></div>
            <div id="price"></div>
          </div>
              <a href="#" id="buy" class="btn btn-primary mt-3">Pirkt biļeti</a>
          </div>
          <div id="map-i"></div>
      </div>
    </div>
  </div>
</div>



@endsection


@section('scripts')
<script>
    function initMap() {

        var uluru = {lat: {{ $event->places->lat }}, lng: {{ $event->places->long }} };


        var map = new google.maps.Map(document.getElementById('map-i'), {
            zoom: 12,
            center: uluru,
            disableDefaultUI: true
        });

        var marker = new google.maps.Marker({
          position: uluru,
          animation: google.maps.Animation.DROP,
          title:"{{$event->name}}",
          map: map
        });

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });


    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxezRtAbO_-Gz5qkAgInTJtvTwNvPGekg&callback=initMap">
</script>

<script>



  //$( document ).ready(function() {
    {!! $abi= $abi ? $abi: 0 !!}

    var contractAbi={!! $abi !!};
    var contractAddress = "{!! $address !!}";

    if (contractAbi && contractAddress){
      var contract = web3.eth.contract(contractAbi).at(contractAddress);

      //var ticketName = contract.ticketTypes(0)[0].toString();
      //var ticketPrice = web3.fromWei(contract.ticketTypes(0)[1].toString(), 'ether');

      $( "#remaining" ).text("Atlikušo biļešu skaits: "+contract.ticketsLeft(0).toString());
      $( "#price" ).text("Cena: "+web3.fromWei(contract.ticketTypes(0)[1].toString(), 'ether')+" ETH");

      $( "#ticketType" ).append( "<select id='Types'></select>" );
      for (var i=0; i<contract.ticketTypesCount().toString(); i++){
        $('#Types').append('<option value='+i+'>'+contract.ticketTypes(i)[0].toString()+'</option>');
      }

      $('#Types').on('change', function() {
        $( "#remaining" ).text("Atlikušo biļešu skaits: "+contract.ticketsLeft(this.value).toString());
        $( "#price" ).text("Cena: "+web3.fromWei(contract.ticketTypes(this.value)[1].toString(), 'ether')+" ETH");
      })

    }

  //});

    $("#buy").click(function() {
      type=$( "#Types option:selected" ).val();
      price=contract.ticketTypes(type)[1].toString();
      contract.buyTicket.sendTransaction(type, {from: "{!! Auth::user()->ethwallet !!}", value: price});
      updateBalance();
    });

</script>
@endsection
