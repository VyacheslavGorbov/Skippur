<html>
	<head>
		
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
    <style>
			table{
				table-layout:fixed;
			}
			td{
				width:33%;
			}
			.today{
				background:yellow;
			}
			nav {
            text-align: center;
            background: rgb(80,117,160);
            background: linear-gradient(167deg, rgba(80,117,160,1) 0%, rgba(104,255,200,1) 100%);
        }
		</style>
		<script>
			$(".editAvail").hide();
		</script>



	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/home/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/home/employeeProfile">My Profile</a>
        <a href="/employee/displayEmployeeSchedule">My Schedule</a>
        <a href="/employee/newBookings">Confirm New Bookings</a>
        <a href='/home/logout' class="topcorner">Logout</a>
    </nav>
		<div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
							echo $data['calender'];
						 ?>

					</div>
				</div>

			</div>
		</div>
	<div>
			<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <center><h4 class="modal-title">Availability for: <span id="slot"><span></h4></center>
				      </div>
				      <div class="modal-body">
				        <div class="row">
				        	<div class="col-md-12">
				        		<form action="/Employee/set_Availability" method="post">
				        			<div class="form-group">
				        				<label for="appt">Choose your availability start time:</label>
										<input required type="time" id="appt" name="availability_start_time"
       										min="06:00" max="18:00" required>
											<!--<small>Office hours are 9am to 6pm</small> -->
									</div>
									<div class="form-group">
				        				<label for="appt">Choose your break start time:</label>
										<input required type="time" id="appt" name="break_start_time"
       										min="07:00" max="18:00" required>
											<!--<small>Office hours are 9am to 6pm</small> -->
									</div>
									<div class="form-group">
				        				<label for="appt">Choose your break end time:</label>
										<input required type="time" id="appt" name="break_end_time"
       										min="06:00" max="18:00" required>
											<!--<small>Office hours are 9am to 6pm</small> -->
									</div>
									<div class="form-group">
				        				<label for="appt">Choose your availability end time:</label>
										<input required type="time" id="appt" name="availability_end_time"
       										min="06:00" max="18:00" required>
											<!--<small>Office hours are 9am to 6pm</small> -->
									</div>
									<input type="hidden" name="date" id="today">

									<div class="modal-footer">
									<div class="form-group pull-right">
										<button class="btn btn-primary" type="submit" name="submit">Submit</button>
									</div>
									</div>


				        		</form>
				        	</div>
				        </div>
				      </div>
				      
				        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				      
				 </div>

			</div>
		</div>
	</div>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>

		$(".setAvail").click(function(){
			var dateS = $(this).attr('timeAvail');
			$("#slot").html(dateS);

			$("#today").val(dateS);
			
			$("#myModal").modal("show");
			$(this).html("Edit Availability");
			$(this).disabled = true;

})



	</script>
	
	</body>
</html>


