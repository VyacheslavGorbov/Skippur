<?php
	class EmployeeController extends Controller{

		public function add_employee()
        {
            if(isset($_POST['action'])){

            	session_start();
            	$employee_first_name = $_POST['employee_first_name'];
                $employee_last_name = $_POST['employee_last_name'];
            	$employee_email = $_POST['employee_email'];
            	$manager_id = $_SESSION['user_id'];
                $site_id = $this->model('Site')->getSite($manager_id)->site_id;
                $employee = $this->model('Employee');
            	$employee->employee_first_name = $employee_first_name;
                $employee->employee_last_name = $employee_last_name;
                $employee->site_id = $site_id;
            	$employee->employee_email = $employee_email;
            	
            	$employee->insert();
                
			 }else{
                $this->view('employee/add_employee');
            }
        }

	}











?>