@extends('layouts.app')
@section('content')
<div class="container my-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
            <div class="list-group">
                @foreach ( $events as $event )
                    <a href="{{ url('event', $event['id']) }}" class="gal">
                        <div class="list-group-item text-white bg-dark my-1">
                            <div class="list-item-with-icon row">
                                <div class="col-md-5 col-sm-12 py-md-5 py-0 py-lg-0">
                                    <img class="img-thumbnail my-md-5 my-0 ny-lg-0" src="{{ asset( $event->images()['asset_path'].$event->images()['image_small'] ) }}" alt="">
                                </div>
                                <div class="card col-md-7 col-sm-12 bg-dark">
                                    <div class="card-body bg-dark text-center">
                                        <h4 class="card-title">
                                            {{ $event->name }}
                                        </h4>
                                        <p>
                                            {{ $event->description }}
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
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
