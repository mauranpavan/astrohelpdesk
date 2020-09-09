<?php
class TicketController extends Controller{
	public function index(){
		if(empty($_SESSION['login']))
			header('location:/Login/login');
		else{

				$ticket = $this->model('Ticket');

				$completedCount = $ticket->getCompletedTicketsCount($_SESSION['user_id']);
				$assignedCount = $ticket->getAssignedTicketsCount($_SESSION['user_id']);

				if($_SESSION['user_type'] == 'tech')
				$tickets = $ticket->getAllTechTickets($_SESSION['user_id']);
				else
				$tickets = $ticket->getAllUserTickets($_SESSION['user_id']);

				//create array 
				$ticketsInfo = array('completedCount'=>$completedCount, 'tickets'=>$tickets, 'assignedCount'=>$assignedCount);	

				$this->view('Ticket/index', $ticketsInfo);
		}

	

	}

	//Creates a ticket
	public function create(){
		if(!isset($_POST['action'])){ //if it is not null
			$this->view('Ticket/create');	
		}else{
			$ticket = $this->model('Ticket');
			$ticket->title = $_POST['title'];
			$ticket->description = $_POST['description'];
			$ticket->created_by = $_SESSION['user_id'];
			$ticket->created_on = date("Y/m/d h:i:sa");
			$ticket->ticket_status = 'open';
			$ticket->urgency = '3';
			$ticket->priority = '3';
			$ticket->insert();
			//redirecttoaction
			header('location:/Ticket/index');
			
		}
	}

	//Default edit which end user uses
	public function edit($ticket_id){
		$theTicket = $this->model('Ticket')->find($ticket_id);
		if(!isset($_POST['action'])){
			$this->view('Ticket/edit', $theTicket);	
		}else{
			$theTicket->title = $_POST['title'];
			$theTicket->description = $_POST['description'];
			$theTicket->edit();
			//redirecttoaction
			header('location:/Ticket/index');//same as <a href='/Default/index'>text</a>
		}
	}

	//Accessed by tech only to modify urgency and priority of ticket
	public function update($ticket_id){
		$theTicket = $this->model('Ticket')->find($ticket_id);



		if(!isset($_POST['action'])){
			$this->view('Ticket/update', $theTicket);	
		}else{
			$theTicket->title = $_POST['title'];
			$theTicket->description = $_POST['description'];
			$theTicket->urgency =  $_POST['urgencyList'];
			$theTicket->priority =  $_POST['priorityList'];
			$theTicket->ticket_status =  $_POST['ticketStatusList'];
			

			if($_POST['ticketStatusList'] == 'closed')
					$theTicket->closed_on = date("Y/m/d h:i:sa");
			else if($_POST['ticketStatusList'] == 'open')
					$theTicket->closed_on = null; //to reset

		    $theTicket->update();
			//redirecttoaction
			header('location:/Ticket/index');//same as <a href='/Default/index'>text</a>
		}
	}



	public function delete($ticket_id){
		$theTicket = $this->model('Ticket')->find($ticket_id);
		if(!isset($_POST['action'])){
			$this->view('Ticket/delete', $theTicket);	
		}else{
			$theTicket->delete();
			//redirecttoaction
			header('location:/Ticket/index');
		}

	}

	//copies information of an existing ticket
	public function copy($ticket_id){
		$theTicket = $this->model('Ticket')->find($ticket_id);;

		if(!isset($_POST['action'])){ 
			$this->view('Ticket/copy', 	$theTicket);	
		}else{
			$ticket = $this->model('Ticket');
			$ticket->title = $_POST['title'];
			$ticket->description = $_POST['description'];
			$ticket->created_by = $_SESSION['user_id'];
			$ticket->created_on = date("Y/m/d h:i:sa");
			$ticket->ticket_status = 'open';
			$ticket->urgency = '3';
			$ticket->priority = '3';
			$ticket->insert();
			//redirecttoaction
			header('location:/Ticket/index');
			
		}
	}

	

	//Allows to assign tickets to another technician
	public function reassignTicket($ticket_id){
		$theTicket = $this->model('Ticket')->find($ticket_id);
		$techs =  $this->model('User')->getAllTech();

		$reassignmentTicketArr = array('theTicket'=>$theTicket,
		'techs'=> $techs, 'ticket_id'=>$ticket_id );

		if(!isset($_POST['action'])  && ($_SESSION['user_id'] == $theTicket->assigned_to || empty($theTicket->assigned_to) ))  { ///only assigned tech can reassign
		
			$this->view('Ticket/reassign', $reassignmentTicketArr);
		}else{
			$theTicket->assigned_to = ($_POST['techList']);
			$_SESSION["reassigned_to"] = $_POST['techList'];
			//$reassignmentTicketArr['assigned_to'] = ($_POST['techList']);

		
			$theTicket->reassign();
			//redirecttoaction
			header("location:/Notification/createReassignNotification/$ticket_id");
			//header('location:/Ticket/index');
		}

	}

	//Retrieves tickets that are unassigned so technicians can assign them to themselves or to others
	public function getUnassignedQueue(){
		$ticket = $this->model('Ticket');
		
		$tickets = $ticket->getUnassignedTickets();

		$this->view('Ticket/unassigned_queue', $tickets);
		
	}

	//This does a database search, used by tech and supervisor
	public function searchDbForTickets(){
		$ticket = $this->model('Ticket');
		$tickets = $ticket->search($_POST['search']);

		//var_dump($tickets);
		if(empty($tickets))
		 header("location:/Ticket/index");

	
	   $this->view('Ticket/search', $tickets);
	}

	//Search within your tickets for Users
	public function searchRespectiveTickets(){
		$ticket = $this->model('Ticket');
		$tickets = $ticket->searchYourTickets($_POST['search'], $_SESSION['user_id']);

		//var_dump($tickets);
		if(empty($tickets))
		 header("location:/Ticket/index");

	
	   $this->view('Ticket/search', $tickets);
	}

	//Used for History section of user tdickets
	public function previousTickets(){
		$ticket = $this->model('Ticket');
		$tickets = $ticket->getPreviousUserTickets($_SESSION['user_id']);
		
		//var_dump($tickets);
		//var_dump();
		if(empty($tickets))
		 header("location:/Ticket/index");

		
	   $this->view('Ticket/history', $tickets);
	}


	







	
}


?>
