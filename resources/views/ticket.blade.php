@extends('layouts.app')

@section('content')

    <div class="container-fluid">
      <div id="map-i"></div>
      <img class="img-fluid rounded mx-auto d-block" src="{{ asset( $tick->events->images()['asset_path'].$tick->events->images()['image_large'] ) }}" alt="Card image cap">
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

            marker.addListener('click', function() {
              infowindow.open(map, marker);
            });


        }

    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxezRtAbO_-Gz5qkAgInTJtvTwNvPGekg&callback=initMap">
    </script>
@endsection
