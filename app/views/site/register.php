<html>

<head>
	<title>Business Owner Registration</title>
</head>

<body>
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

	<div align="center">
		Enter your registration information below
		<form action='' method="post" class="container">

			<select name='business_domain' class="dropdown">

				<option selected="business_domain">Choose Business Category</option>
				<?php

				foreach ($data['industry_categories'] as $categories) {
				?>
					<option value="<?php echo $categories->industry_category_name; ?>"><?php echo $categories->industry_category_name; ?></option>
				<?php
				}
				?>
			</select></br>
			Business Name:<input type='text' name='business_name' /><br />
			Site Name:<input type='text' name='site_name' /><br />
			Site Address:<input type='text' name='site_address' /><br />
			Site Postal Code:<input type='text' name='site_postal_code' /><br />
			Site Phone Number:<input type='text' name='site_phone_number' /><br />
			Site Email:<input type='text' name='site_email' /><br />

			<input type="submit" name="action" value="Register" class='btn btn-primary'>
		</form>
	</div>

</body>

</html>