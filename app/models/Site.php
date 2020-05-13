<?php

class Site extends Model
{
    public $site_id;
    public $business_name;
    public $site_name;
    public $site_address;
    public $site_postal_code;
    public $site_phone_number;
    public $site_email;
    public $business_domain;
    public $manager_id;
    public $site_latitude;
    public $site_longitude;

    function All(){
    	//return all records
    	$sql = 'SELECT * FROM Sites';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Site');
        return $stmt->fetchAll();
    }

    function getAllBusinessNames(){
        //return all records
        $sql = 'SELECT * FROM Sites';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Site');
        return $stmt->fetchAll();
    }

	public function getSite($manager_id){
    	$sql = 'SELECT * FROM Sites WHERE manager_id = :manager_id';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['manager_id'=>$manager_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Site');
        return $stmt->fetch();
    }

    public function getSiteId($site_name){
        $sql = 'SELECT * FROM Sites WHERE site_name LIKE :site_name';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['site_name'=>$site_name]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Site');
        return $stmt->fetch();
    }

    public function getSiteById($site_id) {
        $sql = 'SELECT * FROM Sites WHERE site_id = :site_id';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['site_id'=>$site_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Site');
        return $stmt->fetch();
    }



    function insert(){
    	$sql = 'INSERT INTO Sites(business_name, site_name, site_address, site_postal_code, site_phone_number, site_email, business_domain, manager_id, site_latitude, site_longitude) VALUES(:business_name, :site_name, :site_address, :site_postal_code, :site_phone_number, :site_email, :business_domain, :manager_id, :site_latitude, :site_longitude)';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['business_name'=>$this->business_name, 'site_name'=>$this->site_name, 'site_address'=>$this->site_address, 'site_postal_code'=>$this->site_postal_code, 'site_phone_number'=>$this->site_phone_number,'site_email'=>$this->site_email, 'business_domain'=>$this->business_domain, 'manager_id'=>$this->manager_id, 'site_latitude'=>$this->site_latitude, 'site_longitude'=>$this->site_longitude]);
        return self::$_connection->lastInsertId();
    }

}
