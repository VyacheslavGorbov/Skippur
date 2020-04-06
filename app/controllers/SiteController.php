<?php
	class SiteController extends Controller{

		public function register()
        {

            if(isset($_POST['action'])){
            	session_start();
            	$business_name = $_POST['business_name'];
            	$site_name = $_POST['site_name'];
            	$site_address = $_POST['site_address'];
                $site_postal_code = $_POST['site_postal_code'];
                $site_phone_number = $_POST['site_phone_number'];
                $site_email = $_POST['site_email'];
                $business_domain = $_POST['business_domain'];
                $user_id = $_SESSION['user_id'];
            	$site = $this->model('Site');
                $site->business_name = $business_name;
            	$site->site_name = $site_name;
                $site->site_address = $site_address;
                $site->site_postal_code = $site_postal_code;
                $site->site_phone_number = $site_phone_number;
                $site->site_email = $site_email;
                $site->business_domain = $business_domain;
            	$site->manager_id = $user_id;
            	$site->insert();
                $this->view('site/calender');


			 }else{
                $this->view('Site/Register');
            }
        }

        public function addEmployees(){

        }

        public function setAvailability(){

        }

        public function confirmAppointment(){

        }

        public function build_calender($month, $year){
        

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
            $calender.="<center><h2>$monthName $year</h2></center>";

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
                $currentDayRel = str_pad($month, 2, "0", STR_PAD_LEFT);
                $date = "$year-$month-$currentDayRel";

                if($dateToday == $date){
                    $calender.="<td  class='today'><h4>$currentDay</h4>";
                }
                else{
                    $calender.="<td><h4>$currentDay</h4>";
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


	}

?>