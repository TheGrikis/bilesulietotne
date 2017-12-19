@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="list-group">
                @foreach ( $events as $event )
                    <a href="{{ url('event', $event['id']) }}" class="gal">
                        <div class="list-group-item text-white bg-dark my-1">
                            <div class="list-item-with-icon row">
                                <div class="col-md-4 col-sm-12">
                                    <img class="img-thumbnail" src="{{ asset( $event->images()['asset_path'].$event->images()['image_small'] ) }}" alt="">
                                </div>
                                <div class="card col-md-8 col-sm-12 bg-dark">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            {{ $event->name }}
                                        </h4>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            {{ $event->date }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
          </div>
      </div>
    </div>
</div>
@endsection
