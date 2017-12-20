@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="text-white">You are logged in!</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
