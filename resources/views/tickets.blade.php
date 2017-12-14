@extends('layouts.app')

@section('content')
<main role="main">
    <div class="container">

          <div class="card-group">
            <!--div class="col-xs-12 col-sm-12 col-md-8 col-lg-4"-->
                @foreach ( $tickets as $key => $tick )
                    @include('inc.ticket_preview', ['tick' => $tick, 'count' => $key])
                    @if($key%3 == 2)
                      </div>
                      <div class="card-group">
                    @endif
                    
                @endforeach
            <!--/div-->
          </div>
    </div>
</main>
@endsection
