<html>
	<head><title>Confirm New Bookings</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<style>

			/* The flip card container - set the width and height to whatever you want. We have added the border property to demonstrate that the flip itself goes out of the box on hover (remove perspective if you don't want the 3D effect */
			.flip-card {
			  background-color: transparent;
			  width: 300px;
			  height: 300px;
			  border: 1px solid #f1f1f1;
			  perspective: 1000px; /* Remove this if you don't want the 3D effect */
			}

			/* This container is needed to position the front and back side */
			.flip-card-inner {
			  position: relative;
			  width: 100%;
			  height: 100%;
			  text-align: center;
			  transition: transform 0.8s;
			  transform-style: preserve-3d;
			}

			/* Do an horizontal flip when you move the mouse over the flip box container */
			.flip-card:hover .flip-card-inner {
			  transform: rotateY(180deg);
			}

			/* Position the front and back side */
			.flip-card-front, .flip-card-back {
			  position: absolute;
			  width: 100%;
			  height: 100%;
			  -webkit-backface-visibility: hidden; /* Safari */
			  backface-visibility: hidden;
			}

			/* Style the front side (fallback if image is missing) */
			.flip-card-front {
			  background-color: #bbb;
			  color: black;
			}

			/* Style the back side */
			.flip-card-back {
			  background-color: dodgerblue;
			  color: white;
			  transform: rotateY(180deg);
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
        <a href="/home/employeeProfile">My Profile</a>
        <a href="/employee/displayEmployeeSchedule">My Schedule</a>
        <a href="/employee/newBookings">Confirm New Bookings</a>
        <a href='/home/logout' class="topcorner">Logout</a>
    </nav>

		<table class="test"  style="margin-left:auto;margin-right:auto;">
				<tr>
			<?php $counter = 0; foreach ($data['bookings'] as $booking) {  $counter++;?>
				 <td>
				<div class="flip-card">
  					<div class="flip-card-inner">
    					<div class="flip-card-back">
    						<a href=/employee/confirmBooking/<?php echo $booking->booking_id; ?>><button type="button" id="btnSubmit" style="margin-top: 120px;" >CONFIRM BOOKING</button></a>

    						<a href=/employee/declineBooking/<?php echo $booking->booking_id;?>><button type="button" id="btnSubmit" style="margin-top: 50px;" >DECLINE BOOKING</button></a>
      						
    					</div>
    				<div class="flip-card-front">
    					<h3>Appointment</h3>
      					<h3> With: <?php echo $this->model('Customer')->getCustomerByCustomerId($booking->customer_id)->customer_name;?></h3>
      					<p>Time: <?php echo (new DateTime($booking->start_time))->format("H:iA"); ?></p>
      					<p>For: <?php echo $booking->service; ?></p>
      					<p>Date: <?php echo $booking->booking_date; ?></p>
      					<p>Status: <?php echo $booking->status; ?></p>

    					</div>
  					</div>
				</div>
			</td>

			<?php if ($counter == 4) echo "</tr><tr>" ?>

				
			<?php } ?>

		</tr>
</body>


</html>
