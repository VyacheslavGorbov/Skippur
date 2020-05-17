<?php
	
	class Services extends Model{
		
		public $service_id;
		public $service_name;
		public $service_industry_id;

	    public function getServiceName($service_id){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Services WHERE service_id = :service_id';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_id'=>$service_id]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Services');
	        return $stmt->fetch();
    	}

    	public function getService($service_id){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Services WHERE service_id = :service_id';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_id'=>$service_id]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Services');
	        return $stmt->fetch();
    	}

    	public function getServices($service_industry_id){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Services WHERE service_industry_id = :service_industry_id';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_industry_id'=>$service_industry_id]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Services');
	        return $stmt->fetchAll();
    	}

    	public function getServiceId($service_name){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Services WHERE service_name = :service_name';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_name'=>$service_name]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Services');
	        return $stmt->fetch();
    	}

    	public function insert(){
	    	$sql = 'INSERT INTO Services(service_id, service_name) VALUES(:service_id, :service_name)';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_id'=>$this->service_id,'service_name'=>$this->service_name]);
	        return self::$_connection->lastInsertId();
    	}

    	

	}



?>