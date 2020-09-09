<?php


class User extends Model{

    public $username;
    public $password;

	
    public function __construct()
    {   
        parent::__construct();
    }

    public function getLastInsertId(){
        $stmt = self::$_connection->lastInsertId();
       
        return $stmt;
    }


	public function getAll(){
        $stmt = self::$_connection->prepare("SELECT * FROM User");
        $stmt->execute();
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
		return $stmt->fetchAll();
    }

    public function getAllTech(){
        $stmt = self::$_connection->prepare("SELECT user_id, name FROM User WHERE user_type='tech' AND status ='approved' ");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetchAll();
    }

    public function find($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM User WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetch(); 
        
    }

    public function getByUsername($username){
    
        $stmt = self::$_connection->prepare("SELECT * FROM User WHERE username = :username");
        $stmt->execute(['username'=> $username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        return $stmt->fetch();
}


    public function getSupervisorCount(){
    	$stmt = self::$_connection->prepare("SELECT * FROM User WHERE user_type = 'supervisor'");
        $stmt->execute();
    	return $stmt->rowCount();

    }

    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO User(username, password, name, email, phone_number, address, job_type, user_type, status) 
            VALUES(:username, :password, :name, :email, :phone_number, :address, :job_type, :user_type, :status)");
        $stmt->execute(['username' => $this->username,
                        'password'=>$this->password,
                        'name'=>$this->name,
                        'email'=>$this->email,
                        'phone_number'=>$this->phone_number,
                        'address'=> $this->address,
                        'job_type' => $this->job_type,
                        'user_type' => $this->user_type,
                        'status' => $this->status
                       ]);
    }

    public function delete(){
        $stmt = self::$_connection->prepare("DELETE FROM User WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$this->user_id]);
    }


    public function getProfile(){


        return  (string)$this->username ; //. $username; 
    }


 public function updateProfileStatus(){
        $stmt = self::$_connection->prepare("UPDATE user SET status = :status WHERE user_id = :user_id");
        $stmt->execute(['status'=>$this->status, 'user_id'=>$this->user_id]);
    }

    
    public function edit(){
        $stmt = self::$_connection->prepare("UPDATE user SET name = :name, email = :email, phone_number = :phone_number, address = :address, job_type = :job_type WHERE user_id = :user_id");
        $stmt->execute(['name'=>$this->name,
         'email'=>$this->email,'phone_number'=>$this->phone_number, 'address'=>$this->address, 'job_type'=>$this->job_type, 
          'user_id'=>$this->user_id]);
    }
    
    
	
	
	
	
	
	
	
	
	
	
	
	
}





?>
