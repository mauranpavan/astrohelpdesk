<?php
class Image extends Model{
	

    public function __construct()
    {   
        parent::__construct();
    }

     public function getAll($ticket_id){
        $stmt = self::$_connection->prepare("SELECT * FROM Image WHERE ticket_id = :ticket_id");
        $stmt->execute(['ticket_id'=>$ticket_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Image');
        return $stmt->fetchAll();


     }

    public function insert(){
	    $stmt = self::$_connection->prepare("INSERT INTO Image( ticket_id, caption, path_name) 
            VALUES(:ticket_id, :caption, :path_name)");
        $stmt->execute(['ticket_id' => $this->ticket_id,
                        'caption' => $this->caption,
                        'path_name'=>$this->path_name
                       ]);
    }

    public function delete(){
        $stmt = self::$_connection->prepare("DELETE FROM Image WHERE image_id = :image_id");
        $stmt->execute(['image_id'=>$this->image_id]);
    }


    public function find($image_id){
        $stmt = self::$_connection->prepare("SELECT  * FROM Image  WHERE image_id = :image_id");
        $stmt->execute(['image_id'=>$image_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Image');
        return $stmt->fetch();
    }








}


?>