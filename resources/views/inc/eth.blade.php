
<script type="text/javascript">
	
	var web3 = new Web3(new Web3.providers.HttpProvider("http://localhost:8545"));
	web3.eth.defaultAccount = web3.eth.accounts[0];

@if (Auth::user())
	$( document ).ready(function() {
		$('#ethwallet').text("{!! Auth::user()->ethwallet !!}")
		updateBalance();
	});

	function updateBalance(){
		var eth=web3.fromWei(web3.eth.getBalance( {!! json_encode(Auth::user()->ethwallet) !!} )).toString();
		eth=eth.slice(0, (eth.indexOf("."))+4);
		$( "#bilance" ).text(eth +" ETH");
	}

	$('#ethwallet').click(function() {
    	window.prompt("Copy to clipboard: Ctrl+C, Enter", "{!! Auth::user()->ethwallet !!}");
	});
@endif
</script>