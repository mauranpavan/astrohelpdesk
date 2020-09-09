<?php
class Ticket_Detail extends Model{
	

    public function __construct()
    {   
        parent::__construct();
    }

	public function getAll($ticket_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket_Detail JOIN User ON Ticket_Detail.created_by = User.user_id 
             WHERE ticket_id = :ticket_id");
        $stmt->execute(['ticket_id'=>$ticket_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket_Detail');
		return $stmt->fetchAll();
    }

    public function find($ticket_detail_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Ticket_Detail WHERE ticket_detail_id = :ticket_detail_id");
        $stmt->execute(['ticket_detail_id'=>$ticket_detail_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Ticket_Detail');
        return $stmt->fetch();
    }

    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO Ticket_Detail(ticket_id, detail_message, created_by, created_on) 
            VALUES(:ticket_id, :detail_message, :created_by, :created_on)");
        $stmt->execute(['ticket_id'=>$this->ticket_id,
                        'detail_message'=>$this->detail_message,
                        'created_by'=>$this->created_by,
                        'created_on'=>$this->created_on
                       ]);
    }

    public function delete(){
        $stmt = self::$_connection->prepare("DELETE FROM Ticket_Detail WHERE ticket_detail_id = :ticket_detail_id");
        $stmt->execute(['ticket_detail_id'=>$this->ticket_detail_id]);
    }

    
    public function update(){
        $stmt = self::$_connection->prepare("UPDATE Ticket_Detail SET detail_message = :detail_message WHERE ticket_detail_id = :ticket_detail_id");
        $stmt->execute(['detail_message'=>$this->detail_message,
                        'ticket_detail_id'=>$this->ticket_detail_id]);
    }
    

}
?>