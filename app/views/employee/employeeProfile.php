<html>
<head><title>Employee Profile</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
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
			}

		button:hover, a:hover {
			  opacity: 0.7;

			}
	</style>
</head>
<body>
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
                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span>i.rudberg</p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>somerandom@email.com</p></li>
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " >Date Of Joining: 15 Jun 2016</div>
                          <p>
                            <div class="btn-toolbar">
                              <a href=/employee/calender><button type="button" id="btnSubmit" class="btn btn-primary btn-sm">MY AVAILABILITY</button></a>
                              <a href=/employee/displayBookings><button type="button" id="btnCancel" class="btn btn-primary btn-sm">MY SCHEDULE</button></a>
                            </div> 
                            </p>
                      

                      
 

                </div>
            </div>
            </div>

	
</body>
</html>