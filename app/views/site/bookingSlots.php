<!doctype html>
<html land="en">
	
	<head>
		<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script> 
		

		<style>
			.four {

				display: inline-block;

			}

			.row {
				text-align: center;
				border-style: solid;
			}
			
 
		
		
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


			table.test tr {
    			
    			margin: 30px 12px 12px 12px;
    			padding: 12px 12px 12px 12px;
			}
			table.test tr{
    			border-collapse: separate;
    			border:1px solid black;
    			border-spacing: 10px;
    			*border-collapse: expression('separate', cellSpacing = '10px');
    			table-layout:fixed;
			}

			nav {
            text-align: center;
            background: rgb(80,117,160);
            background: linear-gradient(167deg, rgba(80,117,160,1) 0%, rgba(104,255,200,1) 100%);
        }


		</style>

		<title>BOOKING SLOTS</title>


		<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/home/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/customer/profile">Profile</a>
        <a href="/customer/messages">Messages</a>
        <a href="/customer/myAppointments">My Appointments</a>
        <a href='/home/logout' class="topcorner">Logout</a>
    </nav>
	</head>

	<body>
			
		<h1 class="text-center">Available slots for: <?php echo date('m/d/Y', strtotime($data["date"]));?></h1>

		<center><h1> <?php echo $data["message"] ?> <h1></center>

			<?php  foreach($data["slots"] as $ts){ ?>
				<table class="test"  style="border:1px solid black;margin-left:auto;margin-right:auto;">
					<?php $counter = 0; ?>
					<tr>
						<?php foreach ($ts->listOfSlots as $slots) { ?>
							<td><button class="btn btn-success book" site="<?php echo $data['site_id'];?>" slotEnd="<?php echo $slots->end_time;?>" slotStart="<?php echo $slots->start_time;?>" employee="<?php echo $ts->employee_id;?>"  slotInfo ="<?php echo $slots->slot_string;?>" ><?php $counter++; echo $slots->slot_string; ?></button></td>
							<?php if ($counter == 4){ echo "</tr><tr>"; $counter = 0;}?>

					<?php }?>  <tr><table><?php }?>
				
					

			
	

			<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
           <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				      <div class="modal-header">
				      	<button type="button" class="close" data-dismiss="modal">&times;</button>
				      	<titlw><h2> Please confirm your booking details<h2></title>

				      	<h4><b>Booking Date: </b> <?php echo $data["date"]?></h4>

				        
				        <h4 ><b>Booking For:</b>  <span id="slot"><span></h4>
				        <h4 ><b>Service(s): </b><?php echo $data["services"]?><span></h4>
				      </div>
				     <div class="modal-body">
				      	<div class="row">
				        	<div class="col-md-12">

				        		
			        			<div class="form-group">
			        				<label for="appt">Confirm</label>
									<p><input type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
										<!--<small>Office hours are 9am to 6pm</small> -->
								</div>
								
								<textarea rows="4" cols="50" id="message" placeholder="Enter some details about the service(s) you want"> </textarea>
								
								<input type="hidden" name="date" id="date" value="<?php echo $data["date"]?>">
								<input type="hidden" name="serv" id="serv" value="<?php echo $data["services"]?>">
								<input type="hidden" name="customer" id="customer_id" value="<?php echo $data["customer_id"]?>">
									
							</div>
				        </div>
				     </div>
				    <div class="modal-footer">
						<div class="form-group pull-right">
							<button class="btn btn-primary" type="submit" id="submit" data-dismiss="modal">Submit</button>
						</div>
					</div>
				      
				 </div>

			</div>
		</div>
	</div>

	



	
	<script>
		var start;
		var end;
		var employee_id;
		var site_id;
		
		
		
		

		$(".book").click(function(){
			var slotDetail = $(this).attr('slotInfo');
			$("#slot").html(slotDetail);
			start = $(this).attr('slotStart');
			end = $(this).attr('slotEnd');
			employee_id = $(this).attr('employee');
			site_id = $(this).attr('site');
			//$("#today").val(dateS);
			
			$("#myModal").modal("show");
		})

		$('#submit').click(function(e) {
			date = $('#date').val();
			service = $('#serv').val();
			message = $('textarea#message').val();
			customer_id = $('#customer_id').val();

			$('input[type=checkbox]').each(function(){ 
                this.checked = false; 
            });

            
            $("#myModal").find("input,textarea,select").val('').end();
            
            $.ajax({
        	 	url:"/site/set_booking",
        		data: { 'customer_id' : customer_id, 'site_id' : site_id, 'employee_id' : employee_id, 'date' : date, 'start' : start, 'end' : end, 'message' : message, 'service' : service},
        		type: "POST",
        		cache: false,
        		success: function (savingStatus) {
        			window.location = "/site/confirmation";
           			
       			},
        		error: function (xhr, ajaxOptions, thrownError) {
            	alert("Error encountered while saving information");
        		}
    		});
		})

		


		
		
</script>

	</body>


</html>
