<?php
	class EmployeeController extends Controller{

		public function add_employee()
        {
            if(isset($_POST['action'])){
                $employee_first_name = $_POST['employee_first_name'];
                $employee_last_name = $_POST['employee_last_name'];
            	$employee_email = $_POST['employee_email'];
                $employee_username = $_POST['username'];
                $employee_password = $_POST['password'];
            	$manager_id = $_SESSION['user_id'];
                $employee_status = 'active';
                $site_id = $this->model('Site')->getSite($manager_id)->site_id;
                $employee = $this->model('Employee');
            	$employee->employee_first_name = $employee_first_name;
                $employee->employee_last_name = $employee_last_name;
                $employee->site_id = $site_id;
            	$employee->employee_email = $employee_email;
                $employee->employee_username = $employee_username;
                $employee->status = $employee_status;
                $employee->employee_password = password_hash($employee_password, PASSWORD_DEFAULT);
                
            	if(isset($_FILES['image'])){
                    $target = "images/".basename($_FILES["image"]["name"]);
                    
                    $picture = $this->model('Picture');
                    $picture->image = $_FILES["image"]["name"];

                    $picture_id = $picture->insert();
                    move_uploaded_file($_FILES['image']['tmp_name'], $target);
                }
                $employee->picture_id = $picture_id;
            	$employee->insert();
                header('location:/Site/makeCard');
                
			 }else{
                $this->view('employee/add_employee');
            }
        }

        public function makeEmployeeInactive($employee_id){
            
            $theEmployee = $this->model('Employee')->getEmployee($employee_id);
            $theEmployee->status = 'inactive';
            $theEmployee->setEmployeeInactive($employee_id);
            header('location:/Site/makeCard');
        }

	}
?>