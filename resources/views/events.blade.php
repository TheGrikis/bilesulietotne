@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Events</h4></div>

                <div class="panel-body">
                  <div class="list-group">
                    @foreach ( $events as $event )
                    <div class="list-group-item list-group-item-dark">
                      <div class="list-item-with-icon row">
                          <div class="col-md-4">
                              <a href="{{ url('event', $event['id']) }}" class="gal">
                                  <img class="img-thumbnail" src="{{ asset( $event->images()['asset_path'].$event->images()['image_small'] ) }}" alt="">
                              </a>
                          </div>
                          <div class="col-md-8">
                          <h4><a href="{{ url('event', $event['id']) }}">{{ $event->name }}<br>{{ $event->date }}
                          </a></h4>
                          <div>{{ date('h:t', strtotime($event->date)) }} - {{ $event->end_date }}</div>
                          </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
