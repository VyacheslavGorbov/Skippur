<?php
/**
    @accessFilter{LoginFilter}
*/
	class EmployeeAvailabilityController extends Controller{

		public function setAvailability(){
			if(isset($_POST['action'])){
				echo 'YES!!';
			}
		}

	


	}




?>