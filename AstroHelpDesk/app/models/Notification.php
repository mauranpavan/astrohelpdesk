<?php
class Notification extends Model{
	

    public function __construct()
    {   
        parent::__construct();
    }

    public function getAll($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Notification JOIN User ON Notification.receiver_id = User.user_id WHERE user_id = :user_id");
        $stmt->execute(['user_id'=>$user_id]);
    	$stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
		return $stmt->fetchAll();
    }

     public function find($notification_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Notification WHERE notification_id = :notification_id");
        $stmt->execute(['notification_id'=>$notification_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
        return $stmt->fetch();
    }

      public function getApprovalNotificationFor($user_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Notification WHERE sender_id = :user_id AND type = 'approval'"); //Because there is only 1 approval notification per registered tech/supervisor profile
        $stmt->execute(['user_id'=>$user_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Notification');
        return $stmt->fetch();
    }




	public function insert(){
		    $stmt = self::$_connection->prepare("INSERT INTO Notification(message, receiver_id, sender_id, status, type) 
	            VALUES(:message, :receiver_id, :sender_id, :status, :type)");
	        $stmt->execute(['message'=>$this->message,
	                        'receiver_id'=>$this->receiver_id,
	                        'sender_id'=>$this->sender_id,
	                        'status'=>$this->status,
	                        'type'=>$this->type
	                       ]);
	    }


	 public function update(){
	 	 $stmt = self::$_connection->prepare("UPDATE Notification SET status = :status WHERE notification_id = :notification_id");
        $stmt->execute(['status'=>$this->status, 'notification_id'=>$this->notification_id]);


	 }


	public function delete(){
	        $stmt = self::$_connection->prepare("DELETE FROM Notification WHERE notification_id = :notification_id");
	        $stmt->execute(['notification_id'=>$this->notification_id]);
	    }

/*	    
	public function update(){
	        $stmt = self::$_connection->prepare("UPDATE Ticket_Detail SET detail_message = :detail_message WHERE ticket_detail_id = :ticket_detail_id");
	        $stmt->execute(['detail_message'=>$this->detail_message,
	                        'ticket_detail_id'=>$this->ticket_detail_id]);
	}
    


*/

}


?>