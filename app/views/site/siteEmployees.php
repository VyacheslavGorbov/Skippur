<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


		</style>
	</head>
	<body>
		<div><a href="/site/calender"> BACK TO SITE</a>
    		<center><a href="/employee/add_employee"> ADD EMPLOYEE</a></center>
		</div>
		
			<?php
				echo $data['cards'];
			?>
		</div>
		
	
	</body>
</html>
