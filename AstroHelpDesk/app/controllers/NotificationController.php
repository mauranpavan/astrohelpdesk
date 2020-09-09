<?php
class NotificationController extends Controller{
	public function index(){
		if(empty($_SESSION['login']))
			header('location:/Login/login');
		else{
			$notification = $this->model('Notification');
			$notifications = $notification->getAll($_SESSION['user_id']);

			$this->view('Notification/index', $notifications);
		}
	}


	public function createReassignNotification($ticket_id){
		if(!isset($_POST['action'])){ //if it is not null
			
			$theTicket = $this->model('Ticket')->find($ticket_id);



			$notification = $this->model('Notification');
			$notification->message = 'Ticket ' . $theTicket->ticket_id . ' has been assigned to you.';
			$notification->receiver_id = $_SESSION["reassigned_to"];
			$notification->sender_id = $_SESSION['user_id'];
			$notification->status = 'unread';
			$notification->type = 'reassign';
			
			$notification->insert();
			//redirecttoaction
			header('location:/Ticket/index');
			
		}
	}


	public function createProfileNotification(){
		if(!isset($_POST['action'])){ //if it is not null
			
			$theUser = $this->model('User')->find($_SESSION['user_id']);



			$notification = $this->model('Notification');
			$notification->message = 'User ' . $theUser->name . ' needs approval to register as ' . $theUser->user_type;
			$notification->receiver_id = 14;//$_SESSION["reassigned_to"];
			$notification->sender_id = $_SESSION['user_id'];
			$notification->status = 'unread';
			$notification->type = 'approval';
			
			$notification->insert();
			//redirecttoaction
			header('location:/Login/login');
			
		}
	}


	public function readNotification($notification_id){
		if(!isset($_POST['action'])){ //if it is not null
			$theNotification = $this->model('Notification')->find($notification_id);


			$theNotification->status = 'read';

			$theNotification->update();


			header('location:/Notification/index');



			}
		}





}

?>






