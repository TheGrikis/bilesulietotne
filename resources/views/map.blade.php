@extends('layouts.app')

@section('content')
<div id="map"></div>
<script>
    function initMap() {
        @foreach ( $events as $key => $event )
            var uluru{{ $key }} = {lat: {{ $event->places->lat }}, lng: {{ $event->places->long }} };
        @endforeach

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: uluru0,
            disableDefaultUI: true
        });

        @foreach ( $events as $key => $event )
            var marker{{ $key }} = new google.maps.Marker({
              position: uluru{{ $key }},
              animation: google.maps.Animation.DROP,
              title:"{{$event->name}}",
              map: map
            });

        @endforeach




    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxezRtAbO_-Gz5qkAgInTJtvTwNvPGekg&callback=initMap">
</script>
@endsection
