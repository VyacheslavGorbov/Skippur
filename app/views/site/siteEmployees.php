<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script> 
		<style>
			.cards {
  				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  				max-width: 300px;
  				margin: auto;
  				text-align: center;
			}

			.title {
  				color: grey;
  				font-size: 18px;
			}

			button {
	  			border: none;
	  			outline: 0;
	  			display: inline-block;
	  			padding: 8px;
	  			color: white;
	  			background-color: #000;
  				text-align: center;
  				cursor: pointer;
  				width: 100%;
  				font-size: 18px;
			}	

			a {
			  text-decoration: none;
			  font-size: 22px;
			  color: black;
			}

			button:hover, a:hover {
			  opacity: 0.7;

			}
			#my-div {
    			background-color: #f00;
    			width: 200px;
    			height: 20px;
    		}
			a.fill-div {
			display: block;
		    height: 100%;
		    width: 100%;
		    text-decoration: none;
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
		<div><a href="/site/calender"> BACK TO SITE</a>
    		<center><a href="/employee/add_employee"> ADD EMPLOYEE</a></center>
		</div>
		
			<?php
				echo $data['cards'];
			?>
		</div>
		
	
	</body>
</html>
