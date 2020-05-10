<!doctype html>
<html land="en">
	
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script>
			p.four {
  				border-style: dotted;
  				border-width: thick;
			}

		</script>

		<title></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		 crossorigin="anonymous">
		 <link rel="stylesheet" href="/css/main.css">
	</head>

	<body>
		<div class="container" >
			<h1 class="text-center">Book for Date: <?php echo date('m/d/Y', strtotime($data["date"]));?></h1><hr>
			<div class="row">
				<div class=$p.four>
				<?php

					foreach($data["slots"] as $ts){
						?>
						<?php
							
						foreach ($ts->listOfSlots as $slots) {
							# code...
						
						?>
						<div class="col-md-2">
							<div class="form-group">
								
									<button class="btn btn-success book" slotInfo ="<?php echo $slots; ?>" employee_id ="$ts->employee_id"><?php echo $slots; ?></button>
								
							</div>

						</div>

					<?php }?><br/> <p></p><div> <?php }?>
			</div>
		</div>

			<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				      <div class="modal-header">
				      	<button type="button" class="close" data-dismiss="modal">&times;</button>
				      	<h2> Please confirm your booking details<h2>

				      	<h4><b>Booking Date: </b> <?php echo $data["date"]?></h4>

				        
				        <h4 ><b>Booking For:</b>  <span id="slot"><span></h4>
				        <h4 ><b>Service(s): </b><?php echo $data["services"]?><span></h4>
				      </div>
				      <div class="modal-body">
				      	<div class="row">
				        	<div class="col-md-12">

				        		<form action="/Employee/set_Availability" method="post">
				        			<div class="form-group">
				        				<label for="appt">Confirm</label>
										<p><input type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
											<!--<small>Office hours are 9am to 6pm</small> -->
									</div>
									
									<textarea rows="4" cols="50" placeholder="Enter some details about the service(s) you want"> </textarea>
									
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

		$(".book").click(function(){
			var slotDetail = $(this).attr('slotInfo');
			$("#slot").html(slotDetail);
			
			//$("#today").val(dateS);
			
			$("#myModal").modal("show");
			

})



	</script>
	</body>


</html>
