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

        var contentString = '<div id="content">'+
            '<div id="siteNotice">'+
            '</div>'+
            '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
            '<div id="bodyContent">'+
            '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
            'sandstone rock formation in the southern part of the '+
            'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
            'south west of the nearest large town, Alice Springs; 450&#160;km '+
            '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
            'features of the Uluru - Kata Tjuta National Park. Uluru is '+
            'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
            'Aboriginal people of the area. It has many springs, waterholes, '+
            'rock caves and ancient paintings. Uluru is listed as a World '+
            'Heritage Site.</p>'+
            '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
            'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
            '(last visited June 22, 2009).</p>'+
            '</div>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

        @foreach ( $events as $key => $event )
            var marker{{ $key }} = new google.maps.Marker({
              position: uluru{{ $key }},
              animation: google.maps.Animation.DROP,
              title:"{{$event->name}}",
              map: map
            });
        @endforeach

        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });


    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxezRtAbO_-Gz5qkAgInTJtvTwNvPGekg&callback=initMap">
</script>
@endsection