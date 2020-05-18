<?php
    /**
    @accessFilter{LoginFilter}
*/
	class EmployeeController extends Controller{
    /**
        @accessFilter:{LoginFilter}
    */    

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

        /**
        @accessFilter:{LoginFilter}
        */
        public function makeEmployeeInactive($employee_id){
            
            $theEmployee = $this->model('Employee')->getEmployee($employee_id);
            $theEmployee->status = 'inactive';
            $theEmployee->setEmployeeInactive($employee_id);
            header('location:/Site/makeCard');
        }

        /**
        @accessFilter:{EmployeeFilter}
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
            $calender.="<a class='btn btn-xs btn-primary' href='/employee/previous/".date('m',mktime(0,0,0,$month-1, 1, $year))."/".date('Y', mktime(0,0,0, $month-1, 1,$year))."'>Previous Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/employee/current/".date('m')."/".date('Y')."'>Current Month</a>";

            $calender.="<a class='btn btn-xs btn-primary' href='/employee/next/".date('m',mktime(0,0,0,$month+1, 1, $year))."/".date('Y', mktime(0,0,0, $month+1, 1,$year))."'>Next Month</a></center><br>";


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
                   $calender.="<td class='$today'><h4>$currentDay</h4><button class='btn btn-success btn-xs setAvail' timeAvail=$date>Set Availability</button>";
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

            $this->view('employee/employeeCalender', ['calender' => $calender]);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */

        public function calender(){
            $dateComponents = getdate();
            $month = $dateComponents['mon'];
            $year = $dateComponents['year'];
            header('location:/employee/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */

        public function next($month, $year){
            header('location:/employee/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */

        public function current($month, $year){
            header('location:/employee/build_calender/' . $month .'/'. $year);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */

        public function previous($month, $year){
            $calender  = new EmployeeController();
            $calender->build_calender($month,$year);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */

        public function set_Availability(){
           
            $availability_start_time = $_POST['availability_start_time'];
            $availability_end_time = $_POST['availability_end_time'];
            $availability_break_start = $_POST['break_start_time'];
            $availability_break_end = $_POST['break_end_time'];
            $site_id = $this->model('Employee')->getEmployee($_SESSION['employee_id'])->site_id;
            $employee_id = $_SESSION['employee_id'];
            $rawdate = $_POST['date'];
            $availability_date = date('Y-m-d', strtotime($rawdate));
            $availability = $this->model('Employee_Availabilities');
            $availability->e_availability_start_time = $availability_start_time;
            $availability->e_availability_end_time = $availability_end_time;
            $availability->e_availability_break_start = $availability_break_start;
            $availability->e_availability_break_end= $availability_break_end;
            $availability->employee_id = $employee_id;
            $availability->site_id = $site_id;
            $availability->e_availability_date = $availability_date;

            $result = $this->model('Employee_Availabilities')->getAvailability($employee_id, $availability_date);

            if (!$result){

                $num = $availability->insert();
                
            }else{
                
                $num = $availability->update($employee_id, $availability_date);
                
            }

            header('Location: ' . $_SERVER['HTTP_REFERER']);
  
        }

        /**
        @accessFilter:{EmployeeFilter}
        */
        public function displayEmployeeSchedule(){

            $date =  date('Y-m-d'); //"2020-05-20";
            $schedule = $this->model('Bookings')->getEmployeeSchedule($_SESSION['employee_id'], $date);
            $this->view('employee/employeeSchedule', ['schedule'=> $schedule]);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */
        public function newBookings(){
            $status = "unconfirmed";
            $bookings = $this->model('Bookings')->getEmployeesUnconfirmedBookings($_SESSION['employee_id'], $status);
            $this->view('employee/confirmBookings', ['bookings'=> $bookings]);
        }

        /**
        @accessFilter:{EmployeeFilter}
        */
        public function confirmBooking($booking_id){
            $status = "confirmed";
            $booking = $this->model('Bookings');
            $booking->booking_id = $booking_id;
            $booking->status = $status;
            $booking->update();


            $thisBooking = $this->model('Bookings')->getBooking($booking_id);

            
            $site = $this->model('Site')->getSiteById($thisBooking->site_id);
            $site_user_id = $site->manager_id;
            $now = new DateTime();
            $sender_id = 73;
            $receiver_id = $this->model('Customer')->getCustomerByCustomerId($thisBooking->customer_id)->user_id;
            $Message = "Your booking has been confirmed with " . $site->site_name . " on " . $thisBooking->booking_date . " At " . $thisBooking->start_time . ". Please come on time. Thank you";
            //Send message to notify customer of the confirmation

            $message = $this->model('Messages');
            $message->time_sent = $now->format('Y-m-d H:i:s');
            $message->sender_id = $sender_id;
            $message->receiver_id = $receiver_id;
            $message->message = $Message;

            $message->insert();

            header('Location: ' . $_SERVER['HTTP_REFERER']);

        }

        /**
        @accessFilter:{EmployeeFilter}
        */
        public function declineBooking($booking_id){
            $status = "declined";
            $booking = $this->model('Bookings');
            $booking->booking_id = $booking_id;
            $booking->status = $status;
            $booking->update();

            $thisBooking = $this->model('Bookings')->getBooking($booking_id);

            
            $site = $this->model('Site')->getSiteById($thisBooking->site_id);
            $site_user_id = $site->manager_id;
            $now = new DateTime();
            $sender_id = 73;
            $receiver_id = $this->model('Customer')->getCustomerByCustomerId($thisBooking->customer_id)->user_id;
            $Message = "Your booking with " . $site->site_name . " on " . $thisBooking->booking_date . " At " . $thisBooking->start_time . ". has been declined. We are sorry for the inconvenience";
            //Send message to notify customer of the confirmation

            $message = $this->model('Messages');
            $message->time_sent = $now->format('Y-m-d H:i:s');
            $message->sender_id = $sender_id;
            $message->receiver_id = $receiver_id;
            $message->message = $Message;

            $message->insert();

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            
        }

	}
