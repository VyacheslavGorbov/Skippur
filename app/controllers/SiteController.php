<?php
	class SiteController extends Controller{
        

		public function register()
        {

            if(isset($_POST['action'])){
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

                if ($site_address != null) {
                    $latLon = $this->getLatLon($site_address);

                    $site->site_latitude = $latLon[0];
                    $site->site_longitude = $latLon[1];
                }

            	$site->insert();


			 }else{
                $this->view('Site/Register');
            }
        }

        public function getLatLon($address) {
            $result = array();
            $opts = array('http'=>array('header'=>"User-Agent: Skippur 0.2.2\r\n"));
            $context = stream_context_create($opts);

            $decodedJsonStr = json_decode(file_get_contents('https://nominatim.openstreetmap.org/search?q=' . preg_replace('/\s+/', '+', $address) . '&format=json', false, $context), true);
            array_push($result, $decodedJsonStr[0]['lat'], $decodedJsonStr[0]['lon']);
            return $result;
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
            $calender.="<center><h2>$monthName $year</h2>";
            $calender.="<a class='btn btn-xs btn-primary' href='/Site/build_calender/".date('m',mktime(0,0,0,$month-1, 1, $year))."/".date('Y', mktime(0,0,0, $month-1, 1,$year))."'>Previous Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/Site/build_calender/".date('m')."/".date('Y')."'>Current Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/Site/build_calender/".date('m',mktime(0,0,0,$month+1, 1, $year))."/".date('Y', mktime(0,0,0, $month+1, 1,$year))."'>Next Month</a></center><br>";


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
                    $calender.="<td><h4>$currentDay</h4><button class='btn btn danger btn-xs'>N/A</button>";
                }else{
                    $calender.="<td class='$today'><h4>$currentDay</h4><a href='/site/set_Availability/$date' class='btn btn-success btn-xs'>Book</a>";
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

            $this->view('site/calender', ['calender' => $calender]);

        }

        public function calender(){
            $calender  = new SiteController();
            $dateComponents = getdate();
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
            $calender->build_calender($month,$year);
        }

        public function set_Availability($date){
            echo $date;
        }

        public function makeCard(){
            $manager_id = $_SESSION['user_id'];
            

            $site = $this->model('Site')->getSite($manager_id);

            $site_id = $site->site_id;
            $status = 'active';
            $site_employees = $this->model('Employee')->All($site_id, $status);

            $cards = "<table>";
            $cards .= "<tr>";
            $card_counter = 0;
            

            foreach ($site_employees as $employee) {
                $card_counter++;
                # code...
                $cards .= "<td>";

                $employee_picture_id = $employee->picture_id;
                $image = $this->model('Picture')->getPicture($employee_picture_id)->image;

                if($image == '')
                    $image = 'download.jpg';
                $cards .= "<div class='cards'>";
                $cards .= "<img src='../images/".$image."'  style='width:100%'>";
                $cards .= "<h1>$employee->employee_first_name $employee->employee_last_name</h1>";
                $cards .= "<p class='title'>$employee->employee_username</p>";
                $cards .= "<p>$site->site_name</p>";
                $cards .= "<p><a href=/employee/makeEmployeeInactive/$employee->employee_id><button> DELETE EMPLOYEE</button></a></p>";


                $cards .= "</dv>";

                if($card_counter == 4){
                    $cards .= "</tr>";
                    $cards .= "<tr>";
                    $card_counter = 0;

                }
                
                $cards .= "</td>";
                
            }

            $cards .= "</tr>";


            $this->view('site/siteEmployees', ['cards' => $cards]);

        }

        public function homepage($site_id) {
            $site = $this->model('Site')->getSiteById($site_id);
            $this->view('site/homepage', $site);
        }

        


	}
