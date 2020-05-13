<?php
	
	class Sites_Services extends Model{
		
		
	    public $service_id;
	    public $site_id;
	    public $cost;
	    public $service_duration;


	    public function getSiteService($service_id, $site_id){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Sites_Services WHERE service_id = :service_id AND site_id = :site_id';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_id'=>$service_id, 'site_id' => $site_id]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Sites_Services');
	        return $stmt->fetch();
    	}

    	public function getSiteServices($site_id){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Sites_Services WHERE site_id = :site_id';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['site_id' => $site_id]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Sites_Services');
	        return $stmt->fetchAll();
    	}


    	

    	public function insert(){
	    	$sql = 'INSERT INTO Sites_Services(service_id, site_id, cost, service_duration) VALUES(:service_id, :site_id, :cost, :service_duration)';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['service_id'=>$this->service_id,'site_id'=>$this->site_id, 'cost'=>$this->cost, 'service_duration'=>$this->service_duration]);
	        return self::$_connection->lastInsertId();
    	}

	}



?>