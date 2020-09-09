<?php
class Ticket_DetailController extends Controller{
	public function index($ticket_id){
		$theTicket = $this->model('Ticket')->find($ticket_id);

		$ticket_detail = $this->model('Ticket_Detail');
		$ticket_details = $ticket_detail->getAll($ticket_id);

		$images = $this->model('Image')->getAll($ticket_id);


		$ticketDetailArray = array('ticket_id'=>$ticket_id,'theTicket'=>$theTicket,
		'ticket_details'=> $ticket_details, 'images' => $images);

		
		//var_dump($ticketDetailArray);
		$this->view('Ticket_Detail/index', $ticketDetailArray);
		
		//$ticket_details get converted as $model in view
	}

	public function create($ticket_id){
		if(!isset($_POST['action'])){ //if it is not null
			$this->view('Ticket_Detail/create');
		}else{
			$ticket = $this->model('Ticket_Detail');
			$ticket->ticket_id = $ticket_id;
			$ticket->detail_message = $_POST['detail_message'];
			$ticket->created_by = $_SESSION['user_id'];
			$ticket->created_on = date("Y/m/d h:i:sa");
			
			

			$ticket->insert();
			//redirecttoaction
			header("location:/Ticket_Detail/index/$ticket_id");
			
		}
	}






	public function delete($ticket_detail_id){
		$theTicketDetail = $this->model('Ticket_Detail')->find($ticket_detail_id);
		$ticket_id = $theTicketDetail->ticket_id; 
		//echo '====>' . $ticket_id;
		if(!isset($_POST['action'])){
			$this->view('Ticket_Detail/delete', $theTicketDetail);	
		}else{
			$theTicketDetail->delete();
			//redirecttoaction
			header("location:/Ticket_Detail/index/$ticket_id"); 
		}

	}

	
	
}

?>
