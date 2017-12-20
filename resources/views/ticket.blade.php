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
                        <strong class="info-text">{{$tick->events->places->name}}</strong>
                    </div>
                    <div class="col-12 text-center">
                      <strong class="info-text">{{date('d/m/Y', strtotime($tick->events->date))}}</strong>
                      <strong class="info-text">{{date('h:t', strtotime($tick->events->date))}}</strong>
                    </div>
                </div>
              </div>
              <a href="#" class="btn btn-primary mt-3">Aktivizēt biļeti</a>
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
