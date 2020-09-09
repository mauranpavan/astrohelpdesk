<?php
class ImageController extends Controller{
	public function upload($ticket_id){

		if(!isset($_POST['action'])){ 

			$this->view('Ticket_Detail/uploadImage');
		}
		else{

			$theImageUploaded = $this->model('Image');
		
			$theFile = $_FILES["uploadImage"]; //we have to use $_FILES for files

			$target_dir = "uploads/";	
			$allowedTypes = array("jpg", "png", "jpeg", "gif", "bmp");

			$max_upload_bytes = 5000000;
			
			$extension = strtolower(pathinfo(basename($theFile['name']),PATHINFO_EXTENSION));

			$target_file_name = uniqid().'.'.$extension;	

			$target_path = $target_dir . $target_file_name;
			$uploadOk=1;
			//You may limit the size of the incoming file... Check file size
			if ($theFile["size"] > $max_upload_bytes) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Allow certain file formats
			if(!in_array($extension, $allowedTypes)) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			} else {// if everything is ok, try to upload file - to move it from the temp folder to a permanent folder
				if (move_uploaded_file($theFile["tmp_name"], $target_path)) { //This is used to save the image
					echo "The file ". basename( $theFile["name"]). " has been uploaded as <a href='$target_path'>$target_path</a>.";
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
			}




			$theImageUploaded->ticket_id = $ticket_id;
			$theImageUploaded->caption = $_POST["caption"];
			$theImageUploaded->path_name =$target_file_name;
			$theImageUploaded->insert();
				
			//var_dump($theFile);
			header("location:/Ticket_Detail/index/$ticket_id");
		}

	}


	public function delete($image_id){
		$theImage = $this->model('Image')->find($image_id);
		$tempTicketId = $theImage->ticket_id;
		if(!isset($_POST['action'])){
			$this->view('Image/delete', $theImage);	
		}else{
			$theImage->delete();
			//redirecttoaction
			header("location:/Ticket_Detail/index/$tempTicketId");
		}

	}
	



		

}

?>