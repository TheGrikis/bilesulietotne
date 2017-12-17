pragma solidity ^0.4.4;

contract Festival{

	address public organizer;

	mapping (address => uint[3]) public tickets;

	struct ticketType {
	  string name;
	  uint price;
	  uint totalTickets;
	  uint boughtTickets;
	}
	ticketType[] public ticketTypes;

	function Festival() public{

		organizer = msg.sender;

		ticketTypes.push(ticketType({name:"Basic", price:9.99 ether, totalTickets:100, boughtTickets:0}));
		ticketTypes.push(ticketType({name:"Priority", price:19.99 ether, totalTickets:100, boughtTickets:0}));
		ticketTypes.push(ticketType({name:"VIP", price:29.99 ether, totalTickets:100, boughtTickets:0}));
	}

	function buyTicket(uint tType) public payable returns (uint){
		if (tType>=ticketTypes.length)
			return 0;
		if (ticketTypes[tType].boughtTickets>=ticketTypes[tType].totalTickets)
			return 0;
		if (msg.value<ticketTypes[tType].price){
			revert();
			return 0;
		}
		tickets[msg.sender][tType]++;
		ticketTypes[tType].boughtTickets++;	
		//organizer.transfer(this.balance);
		return 1;
	}
	
	function ticketsLeft(uint tType) public view returns (uint){
		return ticketTypes[tType].totalTickets-ticketTypes[tType].boughtTickets;
	}

    function myTicketsCount(uint tType) public view returns (uint){
    	return tickets[msg.sender][tType];
    }

    function sendTo(address adr, uint tType) public returns (bool){
        if (tickets[msg.sender][tType]<=0){
			return false;
		}
    	tickets[msg.sender][tType]--;
    	tickets[adr][tType]++;
		return true;
    }

}