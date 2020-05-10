<?php

class Employee_Availabilities extends Model
{
    public $employee_id;
    public $site_id;
    public $e_availability_start_time;
    public $e_availability_end_time;
    public $e_availability_break_start;
    public $e_availability_break_end;
    public $e_availability_date;
    

    public function getAvailability($employee_id, $e_availability_date){
    	//return all availability for an employee on a particular day
    	$sql = 'SELECT * FROM Employee_Availabilities WHERE employee_id = :employee_id AND e_availability_date = :e_availability_date';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['employee_id'=>$employee_id, 'e_availability_date' => $e_availability_date]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employee_Availabilities');
        return $stmt->fetch();
    }


    public function getSiteAvailability($site_id, $e_availability_date){
        $sql = 'SELECT * FROM Employee_Availabilities WHERE site_id = :site_id AND e_availability_date = :e_availability_date';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['site_id'=>$site_id, 'e_availability_date' => $e_availability_date]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Employee_Availabilities');
        return $stmt->fetchAll();
    }



    function insert(){
    	$sql = 'INSERT INTO Employee_Availabilities(employee_id, site_id, e_availability_start_time, e_availability_break_start, e_availability_break_end, e_availability_end_time, e_availability_date) VALUES(:employee_id, :site_id, :e_availability_start_time, :e_availability_break_start, :e_availability_break_end, :e_availability_end_time, :e_availability_date)';
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['employee_id'=>$this->employee_id,'site_id'=>$this->site_id, 'e_availability_start_time'=>$this->e_availability_start_time, 'e_availability_break_start'=>$this->e_availability_break_start, 'e_availability_break_end'=>$this->e_availability_break_end, 'e_availability_end_time'=>$this->e_availability_end_time, 'e_availability_date'=>$this->e_availability_date]);
        return self::$_connection->lastInsertId();
    }



    public function update(){
        $SQL = 'UPDATE Employee_Availabilities SET e_availability_start_time = :e_availability_start_time, e_availability_break_start = :e_availability_break_start, e_availability_break_end = :e_availability_break_end, e_availability_end_time = :e_availability_end_time WHERE employee_id = :employee_id AND e_availability_date = :e_availability_date';
        $stmt = self::$_connection->prepare($SQL);
        $stmt->execute(['employee_id'=>$this->employee_id, 'e_availability_start_time'=>$this->e_availability_start_time, 'e_availability_break_start'=>$this->e_availability_break_start, 'e_availability_break_end'=>$this->e_availability_break_end, 'e_availability_end_time'=>$this->e_availability_end_time, 'e_availability_date'=>$this->e_availability_date]);
        return $stmt->rowCount();
    }



}
?>
