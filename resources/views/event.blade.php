@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-8">
      <div class="card">
          <div class="card-body text-white text-center">
              <h4 class="card-title">{{ $event->name }}</h4>
              <h6 class="card-subtitle mb-2 text-muted">{{ $event->description }}</h6>
              <p class="card-text"></p>
              <img class="img-fluid" src="{{ asset( $event->images()['asset_path'].$event->images()['image_large'] ) }}" alt="">
              <div class="card-img-overlay">
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
          </div>
              <a href="#" class="btn btn-primary mt-3">Pirkt biļeti</a>
          </div>
          <div id="map-i"></div>
      </div>
    </div>
  </div>
</div>


<script>
    function initMap() {

          var uluru0 = {lat: {{ $event->places->lat }}, lng: {{ $event->places->long }} };


        var map = new google.maps.Map(document.getElementById('map-i'), {
            zoom: 12,
            center: uluru0,
            disableDefaultUI: true
        });

            var marker0 = new google.maps.Marker({
              position: uluru0,
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
@endsection
