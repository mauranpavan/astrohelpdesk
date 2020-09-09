<?php
class UserController extends Controller{
	
	public function getUser($user_id){
		if(empty($_SESSION['login']))
			header('location:/Login/login');
		else{
		$theUser = $this->model('User')->find($_SESSION['user_id']);

		$this->view('Profile/index', $theUser);
			}
	}

	public function edit(){
		$theUser = $this->model('User')->find($_SESSION['user_id']);

		if(!isset($_POST['action'])){
			$this->view('Profile/edit', $theUser);	
		}else{
			$theUser->name = $_POST['name'];
			$theUser->email = $_POST['email'];
			$theUser->phone_number = $_POST['phone_number'];
			$theUser->address =  $_POST['address'];
			$theUser->job_type =  $_POST['job_type'];
			$theUser->edit();
			//redirecttoaction
			header("location:/User/getUser/$_SESSION[user_id]");
		}
	}


}


?>