<!doctype html>
<html land="en">
	
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
			p.four {

		
			}
			
 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		
			.four{

  				border-style: dotted;
  				border-width: thick;
			}

			table.test td {
    			
    			margin: 12px 12px 12px 12px;
    			padding: 12px 12px 12px 12px;
			}
			table.test {
    			border-collapse: separate;
    			border-spacing: 10px;
    			*border-collapse: expression('separate', cellSpacing = '10px');
    			table-layout:fixed;
			}


			table.test td {
    			
    			margin: 12px 12px 12px 12px;
    			padding: 12px 12px 12px 12px;
			}
			table.test {
    			border-collapse: separate;
    			border-spacing: 10px;
    			*border-collapse: expression('separate', cellSpacing = '10px');
    			table-layout:fixed;
			}


		</style>

		<title></title>

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		 integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
		 crossorigin="anonymous">
		 <link rel="stylesheet" href="/css/main.css">
	</head>

	<body>
		<table class="test">
			<tr><h1 class="text-center">Available slots for: <?php echo date('m/d/Y', strtotime($data["date"]));?></h1></tr>

			
				

			<div class="row">
				<div class='$.four'>

				<?php
					$counter = 0;
					foreach($data["slots"] as $ts){
						?>
						<tr>
						
						<?php
							
						foreach ($ts->listOfSlots as $slots) {
							# code...
						
						?>
						<div class="col-md-1">
							<div class="form-group">
								
									<td><button class="btn btn-success book" slotInfo ="<?php echo $slots; ?>" employee_id ="$ts->employee_id"><?php $counter++; echo $slots; ?></button></td>
								
							</div>

						</div>
						<?php if ($counter == 5){ 
									echo "</tr><tr>"; 
									$counter = -1;
									 }?>

					<?php }?></tr>  <br/> <p></p><?php }?>

			

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

				        		<form action="/site/set_booking" method="post">
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
