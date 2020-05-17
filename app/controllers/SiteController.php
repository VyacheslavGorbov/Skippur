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
                echo $business_domain;

                if ($site_address != null) {
                    $latLon = $this->getLatLon($site_address);

                    $site->site_latitude = $latLon[0];
                    $site->site_longitude = $latLon[1];
                }

            	$site->insert();


			 }else{

                $industry_categories = $this->model('Service_Industries')->getIndustryCategories();

                $this->view('Site/Register', ['industry_categories' => $industry_categories]);
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

        

        /**
        @accessFilter:{LoginFilter}
        */

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
            $calender.="<a class='btn btn-xs btn-primary' href='/site/previous/".date('m',mktime(0,0,0,$month-1, 1, $year))."/".date('Y', mktime(0,0,0, $month-1, 1,$year))."'>Previous Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/site/current/".date('m')."/".date('Y')."'>Current Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/site/next/".date('m',mktime(0,0,0,$month+1, 1, $year))."/".date('Y', mktime(0,0,0, $month+1, 1,$year))."'>Next Month</a></center><br>";


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
                    $calender.="<td class='$today'><h4>$currentDay</h4><a href='/site/displaySiteSchedule/$date' class='btn btn-success btn-xs'>SCHEDULE</a>";
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


            

           $site = $this->model('Site')->getSite($_SESSION['user_id'])->site_id;
        
           $business_domain = $this->model('Site')->getSite($_SESSION['user_id'])->business_domain;

          
        
           $industry_category = $this->model('Service_Industries')->getIndustryCategoryByName($business_domain)->industry_category_id;
           $services = $this->model('Services')->getServices($industry_category);
           $service_array = [];
           $our_services_names = [];

           $our_services = $this->model('Sites_Services')->getSiteServices($site);

           foreach ($services as $serv) {
               array_push($service_array, $serv->service_name);
           }

           foreach ($our_services as $our_service) {
                $name = $this->model('Services')->getService($our_service->service_id)->service_name;
                array_push($our_services_names, $name);
               
           }

           $result = array_diff($service_array, $our_services_names);

           

           $this->view('site/calender', ['calender' => $calender, 'services' => $result]);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function calender(){
            $dateComponents = getdate();
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
            header('location:/site/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function next($month, $year){
            header('location:/site/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function current($month, $year){
            header('location:/site/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function previous($month, $year){
            header('location:/site/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function set_Availability($date){
            echo $date;
        }

        /**
        @accessFilter:{LoginFilter}
        */

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


            $this->view('site/siteEmployees', ['cards' => $cards, 'site_id'=>$site_id]);

        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function homepage($site_id) {
            $site = $this->model('Site')->getSiteById($site_id);
            $this->view('site/homepage', $site);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function set_booking(){
            $customer_id = $_POST['customer_id'];
            $site_id = $_POST['site_id'];
            $employee_id = $_POST['employee_id'];
            $booking_date = $_POST['date'];
            $start_time = $_POST['start'];
            $end_time = $_POST['end'];
            $message = $_POST['message'];
            $service = $_POST['service'];
            $thisBooking = $this->model('Bookings');
            $thisBooking->employee_id = $employee_id;
            $thisBooking->customer_id = $customer_id;
            $thisBooking->booking_date = $booking_date;
            $thisBooking->start_time = $start_time;
            $thisBooking->end_time = $end_time;
            $thisBooking->site_id = $site_id;
            $thisBooking->status = "unconfirmed";
            $thisBooking->message = $message;
            $thisBooking->service = $service;
            $thisBooking->insert();

        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function confirmation(){
            $this->view('site/confirmation');
        }

        /**
        @accessFilter:{LoginFilter}
        */


        public function timeSlots($service_requests, $date, $site_id){
            
            $cleanup = 0;
            $count = 0;
            $servi = [];
            $message = "";
            $services = explode(',', $service_requests);
            $time_required = 0;
            
            $customer_id = $this->model('Customer')->getCustomerByUserId($_SESSION['user_id'])->customer_id;

            foreach ($services as $service) {
                array_push($servi, $this->model('Services')->getServiceName($service)->service_name);
            }

            $servi = implode(',', $servi);

            foreach ($services as $service_request) {

                $dur = $this->model('Sites_Services')->getSiteService($service_request, $site_id)->service_duration;
                $time_required = $time_required + $dur;
                
            }

            $duration = $time_required;

            //get every employee working for the site.
            $employees = $this->model('Employee')->All($site_id, $status = 'active');

            $slots = array(); //new slot containing employee info and available slots for the day.
            foreach ($employees as $employee) {

                //get the employee's availability for the day
                $emp_availability = $this->model('Employee_Availabilities')->getAvailability($employee->employee_id, $date);

                if ($emp_availability){
                    //get information about employee's availability for the day
                    $start = new DateTime($emp_availability->e_availability_start_time);
                    $end = new DateTime($emp_availability->e_availability_end_time);
                    $break_start = new DateTime($emp_availability->e_availability_break_start);
                    $break_end = new DateTime($emp_availability->e_availability_break_end);
                    $interval = new DateInterval("PT".$duration."M");
                    $cleanupInterval = new DateInterval("PT".$cleanup."M");

                    //declare new booking slot containing slots for an employee for the day
                    $bookingEmployee = new bookingEmp();

                    $bookingEmployee->employee_id = $emp_availability->employee_id;
                    $bookingEmployee->listOfSlots = array();

                    $tempStartEnd =  new DateTime($emp_availability->e_availability_start_time);
                    $temEnd = $tempStartEnd->add($interval);

                    $employee_bookings = $this->model("Bookings")->getEmployeeBookings($emp_availability->employee_id, $date);

                    if($employee_bookings){

                        $setPoint = $start;

                        for($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)){

                            foreach ($employee_bookings as $booking) {
                                $bookingStart = new DateTime($booking->start_time);
                                $bookingEnd = new DateTime($booking->end_time);

                                $endPoint = clone $intStart;
                                $endPoint->add($interval);

                                if (($intStart == $bookingStart) || (($intStart < $bookingStart) && ($endPoint > $bookingStart)) || (($intStart > $bookingStart) && ($endPoint < $bookingEnd)) || (($bookingStart < $intStart) && ($intStart < $bookingEnd))){
                                $intStart = $bookingEnd;
                                $tempEnd = clone $intStart;
                                $endPoint = $tempEnd->add($interval);
                                }
                            }

                            if (($intStart == $break_start) || (($intStart < $break_start) && ($endPoint > $break_start)) || (($intStart > $break_start) && ($endPoint < $break_end)) || (($break_start < $intStart) && ($intStart < $break_end))){
                            $intStart = $break_end;
                            $tempEnd = clone $intStart;
                            $endPoint = $tempEnd->add($interval);
                            }

                            if($endPoint <= $end){
                                $thisSlot =  new slot();
                                $thisSlot->start_time = date("H:i:s", strtotime(date_format($intStart, 'Y-m-d H:i:s')));
                                $thisSlot->end_time = date("H:i:s", strtotime(date_format($endPoint, 'Y-m-d H:i:s')));
                                $thisSlot->slot_string = $intStart->format("H:iA"). " - " .$endPoint->format("H:iA");
                                array_push($bookingEmployee->listOfSlots, $thisSlot);
                            }
                        
                            $temEnd = $endPoint;
                        }
                        array_push($slots, $bookingEmployee);
                    }
                    else{
                        for($intStart = $start ; $temEnd < $end ; $intStart->add($interval)->add($cleanupInterval)){
                            $endPoint = clone $intStart;
                            $endPoint->add($interval);


                            if (($intStart == $break_start) || (($intStart < $break_start) && ($endPoint > $break_start)) || (($intStart > $break_start) && ($endPoint < $break_end)) || (($break_start < $intStart) && ($intStart < $break_end))){
                                $intStart = $break_end;
                                $tempEnd = clone $intStart;
                                $endPoint = $tempEnd->add($interval);
                            }
                        
                            
                            if($endPoint <=  $end){
                                $thisSlot =  new slot();
                                $thisSlot->start_time = date("H:i:s", strtotime(date_format($intStart, 'Y-m-d H:i:s')));
                                $thisSlot->end_time = date("H:i:s", strtotime(date_format($endPoint, 'Y-m-d H:i:s')));
                                $thisSlot->slot_string = $intStart->format("H:iA"). " - " .$endPoint->format("H:iA");
                                array_push($bookingEmployee->listOfSlots, $thisSlot);
                            }
                            $temEnd = $endPoint;
                        }

                        array_push($slots, $bookingEmployee);
                    }
                }
            }
            $site_name = $this->model('Site')->getSiteById($site_id)->site_name;

            if(empty($slots)){
                $message = $site_name . " doesn't have a booking slot set at the moment, check back later";
            }
            $this->view('site/bookingSlots', ['slots' => $slots, 'date'=>$date, 'message'=>$message, 'services'=>$servi, 'site_id'=>$site_id, 'customer_id'=>$customer_id]);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function scheduleToday(){
            $date = date('Y-m-d');
            $site_id = $this->model('Site')->getSite($_SESSION['user_id'])->site_id;
            $schedule = $this->model('Bookings')->getSiteSchedule($site_id, $date);
            $this->view('site/site_schedule', ['schedule'=> $schedule]);

        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function displaySiteSchedule($date){
            $site_id = $this->model('Site')->getSite($_SESSION['user_id'])->site_id;
            
            //$date = "2020-05-20";  I need to get the date
            $schedule = $this->model('Bookings')->getSiteSchedule($site_id, $date);
            $this->view('site/site_schedule', ['schedule'=> $schedule]);
        }

        /**
        @accessFilter:{LoginFilter}
        */

        public function getEmployeeName($employee_id){
             $firstName = $this->model('Employee')->getEmployee($employee_id)->employee_first_name;
             $lastName = $this->model('Employee')->getEmployee($employee_id)->employee_last_name;

             return $firstName . " " . $lastName;
        }


        /**
        @accessFilter:{LoginFilter}
        */
        public function saveService(){

            $site =  $this->model('Site')->getSite($_SESSION['user_id'])->site_id;
            $price = $_POST['price'];
            $duration = $_POST['duration'];
            $service = $_POST['service'];
            $service_id = $this->model('Services')->getServiceId($service)->service_id;
            $site_service = $this->model('Sites_Services');
            $site_service->service_id = $service_id;
            $site_service->site_id = $site;
            $site_service->cost = $price;
            $site_service->service_duration = $duration;
                    
            $site_service->insert();

        
        }
	}

    class bookingEmp{
        public $employee_id;
        public $listOfSlots;

    }

    class slot{
        public $start_time;
        public $end_time;
        public $slot_string;
    }
