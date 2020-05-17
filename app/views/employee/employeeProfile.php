<html>
<head><title>Employee Profile</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
	<style>
		button {
	  			border: none;
	  			outline: 0;
	  			display: inline-block;
	  			padding: 8px;
	  			color: white;
	  			background-color: #000;
  				text-align: center;
  				cursor: pointer;
  				width: 200px;
  				font-size: 18px;
          padding-bottom: 80px;
			}

      nav {
            text-align: center;
            background: rgb(80,117,160);
            background: linear-gradient(167deg, rgba(80,117,160,1) 0%, rgba(104,255,200,1) 100%);
        }

		button:hover, a:hover {
			  opacity: 0.7;

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
	<div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading">  <h4 >Employee Profile</h4></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                      	<?php
                      		$pic = $data['image']->image == '' ? 'download.jpg' : $data['image']->image;
                      		$picture = "../images/".$pic;
                      		
                      	
                       echo '<img alt="User Pic" src= "../images/'.$pic.'"   id="profile-image1" class="img-circle img-responsive"> '
                       ?>
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                          	<?php
                            echo '<h2>'.$data['employee']->employee_first_name." ".$data['employee']->employee_last_name.'</h2>';
                            
                            echo '<p>an   <b> Employee </b> at <b>'.$data['site_name']. '</b></p>'
                          	?>
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span><?php echo $data['employee']->employee_username ?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $data['employee']->employee_email?></p></li>
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " >Date Of Joining: 15 Jun 2016</div>
                          <p>
                            <div class="btn-toolbar">
                              <a href=/employee/calender><button type="button"  class="btn btn-primary btn-sm">MY AVAILABILITY</button></a>
                              <a href=/employee/displayEmployeeSchedule><button type="button"  class="btn btn-primary btn-sm">MY SCHEDULE</button></a>
                              
                            </div> 
                            </p>
                      

                      
 

                </div>
            </div>
            </div>

	
</body>
</html>