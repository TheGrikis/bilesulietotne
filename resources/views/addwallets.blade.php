@extends('layouts.app')
@section('content')

{!! Form::open(['action' => 'BlockchainController@store','id' => 'wallets']) !!}

    @for ($i = 0; $i < 10; $i++)

        {!! Form::hidden('wallet['.$i.']','', ['id' => 'wallet'.$i]) !!}

    @endfor
    {!! Form::submit('') !!}
{!! Form::close() !!}

@endsection

@section('scripts')
<script>

    var accounts =  web3.eth.getAccounts(function(error, result){
        if(!error){
            console.log(result);
            for (i = 0; i <= 10; i++)
                $( "#wallet"+i ).val(result[i]);
            $("#wallets").submit()
        }
        else
            console.error(error);
            });

</script>
@endsection
