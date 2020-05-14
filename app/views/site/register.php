<html>

<head>
	<title>Business Owner Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyBTHojBKr7jB7xzzUXdcnFlJID3e0Wduno"></script>
	<script>
		var searchInput = 'search_input';

		$(document).ready(function() {
			var autocomplete;
			autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
				types: ['geocode']
			});

			google.maps.event.addListener(autocomplete, 'place_changed', function() {
				var near_place = autocomplete.getPlace();
				document.getElementById('latitude_input').value = near_place.geometry.location.lat();
				document.getElementById('longitude_input').value = near_place.geometry.location.lng();
			});
		});

		$(document).on('change', '#' + searchInput, function() {
			document.getElementById('latitude_input').value = '';
			document.getElementById('longitude_input').value = '';

		});
	</script>
	<style>
		body,
		html {
			height: 100%;
		}

		* {
			box-sizing: border-box;
		}

		/* Add styles to the form container */
		.container {
			margin: 20px;
			text-align: center;
			max-width: 300px;
			padding: 16px;
			background-color: white;
		}

		/* Full-width input fields */
		input[type=text],
		input[type=password] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
		}

		input[type=text]:focus,
		input[type=password]:focus {
			background-color: #ddd;
			outline: none;
		}

		/* Set a style for the submit button */
		.btn {
			background-color: #4CAF50;
			color: white;
			padding: 16px 20px;
			border: none;
			cursor: pointer;
			width: 100%;
			opacity: 0.9;
		}

		.btn:hover {
			opacity: 1;
		}

		.dropdown {

			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
		}

		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
			padding: 12px 16px;
			z-index: 1;
		}
	</style>
</head>

<body>

	<div align="center">
		Enter your registration information below
		<form class="container" action='' method="post">
			<select name='business_domain' class="dropdown" required>

				<option selected="business_domain">Choose Business Category</option>
				<?php

				foreach ($data['industry_categories'] as $categories) {
				?>
					<option value="<?php echo $categories->industry_category_name; ?>"><?php echo $categories->industry_category_name; ?></option>
				<?php
				}
				?>
			</select></br>
			<label>Business Name:</label><input type='text' name='business_name' required/><br />
			<label>Site Name:</label><input type='text' name='site_name' required/><br />
			<label>Site Address:</label><input type='text' id="search_input" name='site_address' required/><br />
			<label>Site Postal Code:</label><input type='text' name='site_postal_code' required/><br />
			<label>Site Phone Number:</label><input type='text' name='site_phone_number' required/><br />
			<label>Site Email:</label><input type='text' name='site_email' required/><br/>
			<input type="hidden" id="latitude_input" name='latitude' required/>
			<input type="hidden" id="longitude_input" name='longitude' required/>
			</br>
			<input type="submit" name="action" value="Register" class='btn btn-primary'>
		</form>
	</div>


</body>

</html>