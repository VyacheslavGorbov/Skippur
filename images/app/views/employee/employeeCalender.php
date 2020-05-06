<html>
	<head>
		
		<meta charset="UTF-8">
		<meta http-"X-UA-Compatible" content="ie=edge">
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
		</style>
		<script>
			$(".editAvail").hide();
		</script>



	</head>
	<body>
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
				        <h4 class="modal-title">Availability for: <span id="slot"><span></h4>
				      </div>
				      <div class="modal-body">
				        <div class="row">
				        	<div class="col-md-12">
				        		<form action="set_Availability" method="post">
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

			

			
		})



	</script>
	
	</body>
</html>


