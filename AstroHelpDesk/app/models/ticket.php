<?php
class Ticket extends Model{
	

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAllUserTickets($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket JOIN User ON Ticket.created_by = User.user_id WHERE created_by = :user_id AND ticket_status = 'open'");
        $stmt->execute(['user_id'=>$user_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
		return $stmt->fetchAll();
    }

    public function getAllTechTickets($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket JOIN User ON Ticket.created_by = User.user_id WHERE assigned_to = :user_id AND ticket_status = 'open'");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->fetchAll();
    }



    public function getUnassignedTickets(){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket JOIN User ON Ticket.created_by = User.user_id WHERE assigned_to IS NULL");
        $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->fetchAll();
    }
    

    public function find($ticket_id){
        //$stmt = self::$_connection->prepare("SELECT * FROM Ticket WHERE ticket_id = :ticket_id");
        $stmt = self::$_connection->prepare("SELECT  * FROM Ticket  JOIN User ON Ticket.created_by = User.user_id WHERE ticket_id = :ticket_id");
        $stmt->execute(['ticket_id'=>$ticket_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->fetch();
    }



    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO Ticket(title, description, created_by, created_on, ticket_status, urgency, priority) 
            VALUES(:title, :description, :created_by, :created_on, :ticket_status, :urgency, :priority)");
        $stmt->execute(['title' => $this->title,
                        'description'=>$this->description,
                        'created_by'=>$this->created_by,
                        'created_on'=>$this->created_on,
                        'ticket_status'=> $this->ticket_status,
                          'urgency'=> $this->urgency,
                            'priority'=> $this->priority
                       ]);
    }

    public function delete(){
        $stmt = self::$_connection->prepare("DELETE FROM Ticket WHERE ticket_id = :ticket_id");
        $stmt->execute(['ticket_id'=>$this->ticket_id]);
    }

    public function edit(){
        $stmt = self::$_connection->prepare("UPDATE Ticket SET title = :title, description = :description WHERE ticket_id = :ticket_id");
        $stmt->execute(['title'=>$this->title,
         'description'=>$this->description, 'ticket_id'=>$this->ticket_id]);
    }
    
    //For tech
    public function update(){
        $stmt = self::$_connection->prepare("UPDATE Ticket SET title = :title, description = :description, urgency  = :urgency, priority  = :priority, ticket_status = :ticket_status, closed_on = :closed_on  WHERE ticket_id = :ticket_id");
        $stmt->execute(['title'=>$this->title,
         'description'=>$this->description, 'urgency'=>$this->urgency, 'priority'=>$this->priority,'ticket_status'=>$this->ticket_status,'closed_on'=>$this->closed_on,'ticket_id'=>$this->ticket_id]);
    }

    
     public function reassign(){
        $stmt = self::$_connection->prepare("UPDATE Ticket SET assigned_to = :assigned_to WHERE ticket_id = :ticket_id");
        $stmt->execute(['assigned_to'=>$this->assigned_to,
          'ticket_id'=>$this->ticket_id]);
    }


     public function search($query){
        $query = '%' . $query . '%';
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket JOIN User ON Ticket.created_by = User.user_id WHERE title LIKE :query OR description LIKE :query");
        $stmt->execute(['query'=>$query]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->fetchAll();
    }

    public function searchYourTickets($query, $user_id){
        $query = '%' . $query . '%';
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket JOIN User ON Ticket.created_by = User.user_id WHERE (title LIKE :query OR description LIKE :query) AND created_by = :user_id");
        $stmt->execute(['query'=>$query, 'user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->fetchAll();
    }

    public function getPreviousUserTickets($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket JOIN User ON Ticket.created_by = User.user_id WHERE created_by = :user_id AND ticket_status = 'closed'");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->fetchAll();
    }

    public function getCompletedTicketsCount($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket WHERE assigned_to = :user_id AND ticket_status = 'closed'");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->rowCount();
    }

    public function getAssignedTicketsCount($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket WHERE assigned_to = :user_id AND ticket_status = 'open'");
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket');
        return $stmt->rowCount();
    }



}
?>