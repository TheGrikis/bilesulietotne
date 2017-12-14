@extends('layouts.app')

@section('content')
    <div class="container">
      <img src="{{ asset( $tick->events->images()['asset_path'].$tick->events->images()['image_large'] ) }}" alt="Card image cap">
    </div>
@endsection
