@extends('layouts.app')

@section('content')
<div class="container my-3">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8">
      <div class="card">
          <div class="card-body text-white text-center">
              <h4 class="card-title">{{ $tick->events->name }}</h4>
              <h6 class="card-subtitle mb-2 text-muted">{{ $tick->events->description }}</h6>
              <p class="card-text"></p>
              <img class="img-fluid" src="{{ asset( $tick->events->images()['asset_path'].$tick->events->images()['image_large'] ) }}" alt="">
              <ul class="list-group">
                  @foreach ($notifications as $noti)
                  <li class="list-group-item list-group-item-action list-group-item-dark">{{ $noti->notification }}</li>
                  @endforeach
              </ul>
              <div class="card-footer">
                <div class="row">
                    <div class="col-12 text-center">
                      <strong class="info-text">Manu biļešu skaits: </strong>
                      <strong class="info-text" id="ticketcount"></strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <strong class="info-text">{{$tick->events->places->name}}</strong>
                    </div>
                    <div class="col-12 text-center">
                      <strong class="info-text">{{date('d/m/Y', strtotime($tick->events->date))}}</strong>
                      <strong class="info-text">{{date('h:t', strtotime($tick->events->date))}}</strong>
                    </div>
                </div>
              </div>
              {{-- <a href="#" class="btn btn-primary mt-3">Aktivizēt biļeti</a> --}}
              <div class="btn btn-outline-primary dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Pārsūtīt</a>
                <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px; margin-top:10px; margin-left:-12px; width: 315px;">
                  <div class="form-horizontal" accept-charset="UTF-8">
                    <input id="recieverwallet" class="form-control login" type="text" name="sp_uname" placeholder="Saņēmēja Ethereum maka numurs" />
                    <input id="sendticket" class="btn btn-primary" style="margin-top:10px;" type="submit" value="Pārsūtīt" />
                  </div>
                </div>
              </div>
          </div>
          <div id="map-i"></div>
      </div>
    </div>
  </div>
</div>


<script>
    function initMap() {

          var uluru0 = {lat: {{ $tick->events->places->lat }}, lng: {{ $tick->events->places->long }} };


        var map = new google.maps.Map(document.getElementById('map-i'), {
            zoom: 12,
            center: uluru0,
            disableDefaultUI: true
        });

            var marker0 = new google.maps.Marker({
              position: uluru0,
              animation: google.maps.Animation.DROP,
              title:"{{$tick->events->name}}",
              map: map
            });



    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxezRtAbO_-Gz5qkAgInTJtvTwNvPGekg&callback=initMap">
</script>
@endsection

@section('scripts')
  <script>

      {!! $abi= $abi ? $abi: 0 !!}

      var contractAbi={!! $abi !!};
      var contractAddress = "{!! $address !!}";

      if (contractAbi && contractAddress){
        var contract = web3.eth.contract(contractAbi).at(contractAddress);

        updateticketcount();


        
        $("#sendticket").click(function() {
          to=$("#recieverwallet").val();
          contract.sendTo.sendTransaction(to, {{$tick->type}}, {from: "{!! Auth::user()->ethwallet !!}"});
          updateticketcount();
        });
      }

      function updateticketcount(){
        ticketcount = contract.myTicketsCount.call({!! $tick->type !!}, {from: "{!! Auth::user()->ethwallet !!}"});
        $("#ticketcount").text(ticketcount);
      }

  </script>
@endsection