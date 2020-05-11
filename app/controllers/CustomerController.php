<?php

use function PHPSTORM_META\type;

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

		public function viewSite($site_id, $month = '', $year = '') {

            if ($month == '' || $year == '') {
                $month = date('m');
                $year = date('Y');
            }

			$calendar = $this->build_calendar($site_id, intval($month), intval($year));
			$site = $this->model('Site')->getSiteById($site_id);
            $this->view('customer/viewSite', ['site' => $site, 'calendar' => $calendar]);
		}

		public function build_calendar($site_id, $month, $year){
        
            //Creating an array containing names of all days in a week.
            $daysOfWeek = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

            //Getting the first day of the month
            $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

            //Getting the number of days this month contains
            $numberDays = date('t', $firstDayOfMonth);

            //Getting some information about the first day of the month
            $dateComponents = getdate($firstDayOfMonth);

            //Getting the name of this month
            $monthName = $dateComponents['month'];

            //Getting the index value 0-6 of the first day of this month
            $dayOfWeek = $dateComponents['wday'];

            //Getting the current date
            $dateToday = date('Y-m-d');

            //Creating the HTML table
            $calender="<table class='table table-bordered'>";
            $calender.="<center><h2>$monthName $year</h2>";
            $calender.="<a class='btn btn-xs btn-primary' href='/customer/viewSite/".  $site_id . '/' . strval($month - 1) . '/'. strval($year) . "'>Previous Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/customer/viewSite/". $site_id. "'>Current Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/customer/viewSite/". $site_id . "/" . strval($month + 1) . "/" . strval($year)."'>Next Month</a></center><br>";


            $calender.="<tr>";

            //Creating the calender headers
            foreach ($daysOfWeek as $day) {
                $calender.="<th class='header'>$day</th>";
                # code...
            }

            $calender.="</tr><tr>";

            //The variable $dayOfWeek will make sure that there must be 7 columns on our table
            if($dayOfWeek > 0){
                for($k=0; $k<$dayOfWeek;$k++){
                    $calender.="<td></td>";
                }
            }

            //Initializing the day counter
            $currentDay = 1;

            //Getting the month number
            $month = str_pad($month, 2, "0", STR_PAD_LEFT);

            while($currentDay <= $numberDays){

                //if senventh column (saturday) reached, start a new row

                if($dayOfWeek == 7){
                    $dayOfWeek = 0;
                    $calender.="</tr><tr>";
                }
                $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
                $date = "$year-$month-$currentDayRel";

                $dayname = strtolower(date('l', strtotime($date)));
                $eventNum = 0;

                $today = $date == date('Y-m-d')? "today" : "";
                if($date<date('Y-m-d')){
                    $calender.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
                }else{
                    $calender.="<td class='$today'><h4>$currentDay</h4><a href='/customer/book/$date' class='btn btn-success btn-xs'>Book</a>";
                }



                $calender.="</td>";

                //Incrementing the counters
                $currentDay++;
                $dayOfWeek++;
            }

            //Completing the row of the last week in month, if necessary
            if($dayOfWeek != 7){
                $remainingDays = 7-$dayOfWeek;
                for($i=0;$i<$remainingDays;$i++){
                    $calender.="<td></td>";
                }
            }

            $calender.="</tr>";
            $calender.="</tr>";

            return $calender;
		}
		
		public function book($date) {

		}

		

	}










?>