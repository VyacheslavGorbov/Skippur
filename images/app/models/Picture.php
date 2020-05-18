<?php

class Picture extends Model
{

    public $image;


    function All($site_id){
    	//return all records
    	$sql = 'SELECT * FROM Pictures';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetchAll();
    }

	function getPicture($picture_id){
    	$sql = 'SELECT * FROM Pictures WHERE picture_id LIKE :picture_id';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['picture_id'=>$picture_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Picture');
        return $stmt->fetch();
    }

    function insert(){
    	$sql = 'INSERT INTO Pictures(image) VALUES(:image)';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['image'=>$this->image]);
        return self::$_connection->lastInsertId();
    }

    


}
?>