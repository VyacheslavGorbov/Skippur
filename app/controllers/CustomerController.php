<?php
	class CustomerController extends Controller{

		public function register()
        {

            if(isset($_POST['action'])){
            	session_start();
            	$customer_name = $_POST['customer_name'];
            	$customer_email = $_POST['customer_email'];
            	$user_id = $_SESSION['user_id'];
            	$customer = $this->model('Customer');
            	$customer->customer_name = $customer_name;
            	$customer->customer_email = $customer_email;
            	$customer->user_id = $user_id;
            	$customer->insert();
                
			 }else{
                $this->view('customer/register');
            }
        }

	}










?>