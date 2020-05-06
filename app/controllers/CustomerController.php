<?php
	class CustomerController extends Controller{

		public function index()
		{
			$customer = $this->model('Customer');
			$customers = $customer->All();
			$sites = $this->model('Site')->All();
			$this->view('customer/index', ['customer' => $customer, 'sites' => $sites]);
		}

		public function register()
        {

            if(isset($_POST['action'])){
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
		
		public function profile() {
			$customer = $this->model('Customer')->getCustomerByUserId($_SESSION['user_id']);
			$this->view('customer/profile', [$customer]);
		}

		public function viewHomepage($site_id) {
			header('location:/site/homepage/' . $site_id);
		}


		

	}










?>