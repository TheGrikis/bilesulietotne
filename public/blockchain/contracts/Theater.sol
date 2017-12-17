pragma solidity ^0.4.18;

contract Theater{

	address public organizer;
	
	uint constant rows=3;
	uint constant columns=6;
	address [6][3] public tickets; //[columns][rows]
	
	mapping (address=>uint[]) public userTickets;
	mapping (address=>uint) public userTicketsLength;
	
	uint price=5.99 ether;
	uint public totalTickets;
	uint public boughtTickets;


	function Theater() public{

		organizer = msg.sender;
		totalTickets=rows*columns;
		boughtTickets=0;
	}

	function buyTicket(uint row, uint column) public payable returns (bool){
		if (tickets[row][column]!=0){
            revert();
			return false;
		}
		if (msg.value<price){
            revert();
            return false;
        }
		tickets[row][column]=msg.sender;
		userTickets[msg.sender].push(row*columns+column);
		userTicketsLength[msg.sender]++;
		boughtTickets++;
		//organizer.transfer(this.balance);
		return true;
	}
	
	function ticketsLeft() public view returns (uint){
	    return totalTickets-boughtTickets;
	}
    
    function myTickets() public view returns (uint[]){
        return userTickets[msg.sender];
    }
    
    function myTicketCount() public view returns (uint){
        return userTicketsLength[msg.sender];
    }

    function sendTo(address adr, uint row, uint column) public returns (bool){
        if (tickets[row][column]!=msg.sender && tickets[row][column]!=adr)
            return false;
    	for (uint i=0; i<userTicketsLength[msg.sender]; i++){
    	    if (userTickets[msg.sender][i]==row*columns+column){
    	        //delete(userTickets[msg.sender][i]);
    	        userTickets[msg.sender][i]=userTickets[msg.sender][userTicketsLength[msg.sender]-1];
    	        userTicketsLength[msg.sender]--;
    	        userTickets[adr].push(row*columns+column);
    	        userTicketsLength[adr]++;
    	        tickets[row][column]=adr;
    	        return true;
    	    }
    	}
        return false;
    }

}