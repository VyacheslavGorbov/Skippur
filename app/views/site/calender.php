
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
		<center>
		<a class='btn btn-xs btn-primary' href='/site/makeCard'>VIEW EMPLOYEES</a>
		<a class='btn btn-xs btn-primary addServices'>ADD SERVICES</a>
		
	</center>
	</div>


	<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				      <div class="modal-header">
				      	<button type="button" class="close" data-dismiss="modal">&times;</button>
				      	<h2> <center>ADD SERVICES</center></h2>
				      </div>
				      <div class="modal-body">
				      	<div class="row">
				        	<div class="col-md-12">
				        		<?php foreach ($data['services'] as $service) {
				        			# code...
				        		?>
				        		<input type="checkbox" name="<?php echo $service->service_name; ?>"  onclick= 'createAlerts(this)';value="<?php $service->service_name ?>">
								<label for="<?php echo $service->service_name ?>"> <?php echo $service->service_name ?></label><br>

								<?php } ?>
				        	</div>
				        </div>
				      </div>
				      <div class="modal-footer">
								<div class="form-group pull-right">
									//<button class="btn btn-primary" type="close" name="close"  onclick= 'closeMyModal()'>CLOSE</button>
								</div>
						</div>
				 </div>

			</div>
		</div>
	</div>

	<div id="insertService" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				      <div class="modal-header">
				      	<button type="button" class="close" data-dismiss="modal">&times;</button>
				      	<h2> <center><h4 ><b>Details for:</b>  <span id="slot"><span></h4></center></h2>
				      </div>
				      <div class="modal-body">
				      	<div class="row">
				        	<div class="col-md-12">
				        			<form action="" method="post"  id="sendDetails">
				        			<div class="form-group">
				        				<label for="appt">Service Duration: </label>
										<input required type="number" id="appt" name="duration" id="dur">
											<small>minutes</small>
									</div>
									<div class="form-group">
				        				<label for="appt">Service Price:</label>
										<input required type="number" id="appt" name="price" id="price"
       										min="0" max="1000" required>
											<small>CAD</small>
									
									<input type="hidden" name="service" id="service">

									<div class="modal-footer">
								<div class="form-group pull-right">
									<button class="btn btn-primary" type="submit" name="submit" data-dismiss="modal" >ADD SERVICE</button>
								</div>
								</div>

								</form>

								
				        	</div>
				        </div>
				      </div>
				      
				        
				      
				 </div>

			</div>
		</div>
	</div>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>

		$(".addServices").click(function(){
			var slotDetail = $(this).attr('slotInfo');
			$("#slot").html(slotDetail);
			
			//$("#today").val(dateS);
			$("#myModal").modal({"backdrop": "static"});
			$("#myModal").modal("show");
			

	})

		function createAlerts(theCheckbox){
			if(theCheckbox.checked){
				var service = theCheckbox.name;
				$("#slot").html(service);
				$("#service").val(service);

				$("#insertService").modal("show");
			}
			else{
				alert("NO WAY");
			}
		}

		function closeMyModal(){
			
			$("#myModal").modal('hide');
		}

		$('#sendDetails').on('submit', function(e){
			//alert(obj['service']);
				
			  <?php
			//function insertValues(){
				
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
				  	
			 

			?>
			//$("#myModal").modal("show");
			$('#insertService').modal('hide');
   			 return false;
		});
		
		
		
	


	</script>


	</body>
</html>


