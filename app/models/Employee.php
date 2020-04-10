<?php

class Employee extends Model
{
    public $employee_first_name;
    public $employee_last_name;
    public $site_id;
    public $employee_email;


    function All($site_id){
    	//return all records
    	$sql = 'SELECT * FROM Employees WHERE site_id = :site_id';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employees');
        return $stmt->fetchAll();
    }

	function getUser($employee_first_name, $employee_last_name){
    	$sql = 'SELECT * FROM Employees WHERE employee_first_name LIKE :employee_first_name  AND employee_last_name LIKE :employee_last_name';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['username'=>$username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employees');
        return $stmt->fetch();
    }

    function insert(){
    	$sql = 'INSERT INTO Employees(employee_first_name, employee_last_name, site_id, employee_email) VALUES(:employee_first_name, :employee_last_name, :site_id, :employee_email)';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['employee_first_name'=>$this->employee_first_name,'employee_last_name'=>$this->employee_last_name, 'site_id'=>$this->site_id, 'employee_email'=>$this->employee_email]);
        return self::$_connection->lastInsertId();
    }


}
?>