<?php
class SurveyController extends Controller{
	public function index(){
		//$ticket = $this->model('Ticket');


		$this->view('Survey/create');
	}


	public function create(){
		//$ticket = $this->model('Ticket');


		$this->view('Survey/create');
	}

}

?>
