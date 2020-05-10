<?php

class Employee extends Model
{
    public $employee_id;
    public $employee_first_name;
    public $employee_last_name;
    public $site_id;
    public $employee_email;
    public $employee_username;
    public $employee_password;
    public $status;
    public $picture_id;



   public function All($site_id, $status = ''){
    	//return all records
    	$sql = 'SELECT * FROM Employees WHERE site_id = :site_id AND status = :status';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['site_id'=>$site_id, 'status'=>$status]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employee');
        return $stmt->fetchAll();
    }

	function getEmployee($employee_id){
    	$sql = 'SELECT * FROM Employees WHERE employee_id LIKE :employee_id';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['employee_id'=>$employee_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employee');
        return $stmt->fetch();
    }

    

    public function getUser($username){
        $sql = 'SELECT * FROM Employees WHERE employee_username LIKE :employee_username';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['employee_username'=>$username]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employee');
        return $stmt->fetch();
    }

    function insert(){
    	$sql = 'INSERT INTO Employees(employee_first_name, employee_last_name, site_id, employee_email, employee_username, employee_password, status, picture_id) VALUES(:employee_first_name, :employee_last_name, :site_id, :employee_email, :employee_username, :employee_password, :status, :picture_id)';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['employee_first_name'=>$this->employee_first_name,'employee_last_name'=>$this->employee_last_name, 'site_id'=>$this->site_id, 'employee_email'=>$this->employee_email, 'employee_username'=>$this->employee_username, 'employee_password'=>$this->employee_password, 'status'=>$this->status, 'picture_id'=>$this->picture_id]);
        return self::$_connection->lastInsertId();
    }

    function setEmployeeInactive($employee_id){
        $sql = 'UPDATE employees SET status = :status WHERE employee_id = :employee_id';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['status'=>$this->status, 'employee_id'=>$employee_id]);
        return $stmt->rowCount();
    }


}
?>