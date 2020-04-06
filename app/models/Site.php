<?php

class Site extends Model
{
    public $business_name;
    public $site_name;
    public $site_address;
    public $site_postal_code;
    public $site_phone_number;
    public $site_email;
    public $business_domain;
    public $manager_id;

    function All(){
    	//return all records
    	$sql = 'SELECT * FROM Sites';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Sites');
        return $stmt->fetchAll();
    }

	function getCustomer($site_name){
    	$sql = 'SELECT * FROM Sites WHERE site_name LIKE :site_name';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['site_name'=>$site_name]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Sites');
        return $stmt->fetch();
    }

    function insert(){
    	$sql = 'INSERT INTO Sites(business_name, site_name, site_address, site_postal_code, site_phone_number, site_email, business_domain, manager_id) VALUES(:business_name, :site_name, :site_address, :site_postal_code, :site_phone_number, :site_email, :business_domain, :manager_id)';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['business_name'=>$this->business_name, 'site_name'=>$this->site_name, 'site_address'=>$this->site_address, 'site_postal_code'=>$this->site_postal_code, 'site_phone_number'=>$this->site_phone_number,'site_email'=>$this->site_email, 'business_domain'=>$this->business_domain, 'manager_id'=>$this->manager_id]);
        return self::$_connection->lastInsertId();
    }

}
?>