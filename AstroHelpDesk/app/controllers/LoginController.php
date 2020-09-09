<?php
class LoginController extends Controller{
	
	public function index(){
		
		
	}


	public function login(){

		if(!isset($_POST['action']))
			$this->view('Login/index');
		else
		{
			$user = $this->model('User')->getByUsername($_POST['username']);

			//to see if we have the inputted username in db
			if(empty($user))
			{
				header('location:/Login/login'); 
				$data['error'] = 'No user is found';
			}
			else 
			{
				//echo "user $user->username is found<br>" ;

				if($user->status == "approved")
				{
					echo "User is approved to login";
						
						
					if(password_verify($_POST['password'], $user->password)) //we will verify password in form with the hashed_password
					{ 
						echo "user $user->username is logged in<br>" ;

						$_SESSION['user_id'] = $user->user_id;
						$_SESSION['user_type'] = $user->user_type;
						$_SESSION['username'] = $user->username;
						$_SESSION['login'] = true;
 
						//if(empty($user->username))
						//	$_SESSION['username'] = "";


						header('location:/Ticket/index'); 					
					}
					else
					{
						header('location:/Login/login'); 
						echo "Login failed. Password Error";
					}
				}
				else
				{
					header('location:/Login/login'); 
					echo "User is not approved to login";

				}
			}
		}
	}


	
	public function register(){

		
		if(!isset($_POST['action'])){
			$this->view('Login/register');

		}
		else
		{
			if($_POST['password'] == ($_POST['password_confirm']))
			{
				$user = $this->model('User');
				$user->username = $_POST['username'];
				$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
				$user->name = $_POST['name'];
				$user->email = $_POST['email'];
				$user->phone_number = $_POST['phone_number'];
				$user->address = $_POST['address'];
				$user->job_type = $_POST['job_type'];
				$user->user_type = $_POST['userTypeList'];

				if(strtolower($_POST['userTypeList']) == 'end user')
					$user->status= 'approved';
				else if(strtolower($_POST['userTypeList']) == 'supervisor' && $user->getSupervisorcount() <= 0 )
				    $user->status= 'approved';
				else
					$user->status= 'pending';

				

				//echo('->>' . $user->getSupervisorCount());

				$user->insert();

				$_SESSION['user_id'] = $user->getLastInsertId(); //$user->user_id; 

				

			}

			

			if($user->status == 'pending')
				header('location:/Notification/createProfileNotification'); //request to have profile approved
			else
				header('location:/Login/login');
			
			//var_dump($_SESSION['user_id']);
		}




	}

	
	public function logout(){
		session_destroy();
		header('location:/Login/login');

   }


   //Approves profile status
	public function grantPermission($user_id){

		if(!isset($_POST['action'])){

			$theUser = $this->model('User')->find($user_id);
			$theUser->status='approved';
			
			$theUser->updateProfileStatus();

			//Delete the notification
			$theNotification = $this->model('Notification')->getApprovalNotificationFor($user_id); //We find the notification that initiated the approval process and delete it
			$theNotification->delete();
		}

		header('location:/Notification/index');

	}

	//Denies profile status
	public function denyPermission($user_id){

		if(!isset($_POST['action'])){

			$theUser = $this->model('User')->find($user_id);
			$theUser->status='denied';

			//Delete the notification
			$theNotification = $this->model('Notification')->getApprovalNotificationFor($user_id); 
			$theNotification->delete();
		}

		header('location:/Notification/index');

	}
 	
	




}

?>
