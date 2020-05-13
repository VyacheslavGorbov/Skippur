<?php
	
	class Service_Industries extends Model{
		public $industry_category_id;
		public $industry_category_name;
	    

	    public function getIndustryCategoryById($industry_category_id){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Service_Industries WHERE industry_category_id = :industry_category_id';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['industry_category_id'=>$industry_category_id]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Service_Industries');
	        return $stmt->fetch();
    	}

    	public function getIndustryCategoryByName($industry_category_name){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Service_Industries WHERE industry_category_name = :industry_category_name';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['industry_category_name'=>$industry_category_name]);
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Service_Industries');
	        return $stmt->fetch();
    	}

    	public function getIndustryCategories(){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT * FROM Service_Industries';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute();
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Service_Industries');
	        return $stmt->fetchAll();
    	}

    	public function getIndustryCategoriesNames(){
	    	//return all booking for an employee on a particular day
	    	$sql = 'SELECT  industry_category_name FROM Service_Industries';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute();
	        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Service_Industries');
	        return $stmt->fetchAll();
    	}


    	

    	public function insert(){
	    	$sql = 'INSERT INTO Service_Industries(industry_category_id, industry_category_name) VALUES(:industry_category_id, :industry_category_name)';
	        $stmt = self::$_connection->prepare($sql);
	        $stmt->execute(['industry_category_id'=>$this->industry_category_id,'industry_category_name'=>$this->ndustry_category_name]);
	        return self::$_connection->lastInsertId();
    	}

	}



?>