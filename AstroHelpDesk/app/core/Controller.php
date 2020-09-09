<?php

class Controller
{

	protected function view($view, $model = []){
		if(file_exists('app/views/' . $view . '.php')){
			//not sure about _once here...
			if(isset($_SESSION['login'])){ // isset($_SESSION['user_id']
				require 'app/views/header.php';
				require 'app/views/footer.php';

			}
			require 'app/views/' . $view . '.php';
		}
		else
			echo "Can't load view $view: file not found!";
	}

	public static function model($model){
		if(file_exists('app/models/' . $model . '.php')){
			require_once 'app/models/' . $model . '.php';
			return new $model();
		}else 
			return null;//could also return new stdClass();
	}

}
?>