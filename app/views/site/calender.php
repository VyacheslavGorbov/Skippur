
<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/home/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/employee/add_employee">ADD NEW EMPLOYEE</a>
        <a href="/site/calender">HOME</a>
        <a href="/site/scheduleToday">SCHEDULE</a>
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
				        		<input type="checkbox" name="<?php echo $service; ?>"  onclick= 'createAlerts(this)';value="<?php $service ?>">
								<label for="<?php echo $service ?>"> <?php echo $service ?></label><br>

								<?php } ?>
				        	</div>
				        </div>
				      </div>
				      <div class="modal-footer">
								<div class="form-group pull-right">
									<button class="btn btn-primary" type="close" id = "close" name="close">CLOSE</button>
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
				    <h2> <center><h4 ><b>Details for:</b>  <span id="serviceName"><span></h4></center></h2>
				</div>
				<div class="modal-body">
				    <div class="row">
				        <div class="col-md-12">
				        	
				        		<div class="form-group">
				        			<label for="appt">Service Duration: </label>
									<input required type="number" name="duration" id="dur">
									<small>minutes</small>
								</div>
								<div class="form-group">
				        			<label for="appt">Service Price:</label>
									<input required type="number" id="price" name="price" id="price"
       										min="0" max="1000" required>
									<small>CAD</small>
								</div>
								<input type="hidden" name="service" id="service">
									
								<div class="modal-footer">
									<div class="form-group pull-right">
										<button class="btn btn-primary" id="submit" data-dismiss="modal"> ADD SERVICE</button>
									</div>
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
		var chosen = false;

		$(".addServices").click(function(){
			$("#myModal").modal("show");
		});

		function createAlerts(theCheckbox){
			
			if(theCheckbox.checked){
				chosen = true;
				var serv = theCheckbox.name;
				$("#serviceName").html(serv);
				$("#service").val(serv);
				$('#myModal').modal('hide');
				$("#insertService").modal("show");
			}
			
		}
		$('#close').click(function(e){
			$('#myModal').modal('hide');
		})
		$('#submit').click(function(e) {
			
			var service = $("#service").val();
			var price = $("#price").val();
			var duration = $("#dur").val();


			$.ajax({
        	 	url:"/site/saveService",
        		data: { 'service' : service, 'price' : price, 'duration' : duration},
        		type: "POST",
        		cache: false,
        		success: function (savingStatus) {
           			
       			},
        		error: function (xhr, ajaxOptions, thrownError) {
            	alert("Error encountered while saving the comments.");
        		}
    		});

			

    		$("#myModal").modal("show");
    		
		});

		$('#insertService').on('hidden.bs.modal', function () {
    		$(this).find("input,textarea,select").val('').end();

		 });
	</script>


	</body>
</html>


