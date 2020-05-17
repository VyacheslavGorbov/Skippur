<html>
<head><title>ADD EMPLOYEE</title>
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
		input[type=password],
		input[type=file] {
			width: 100%;
			padding: 15px;
			margin: 5px 0 22px 0;
			border: none;
			background: #f1f1f1;
		}

		input[type=text]:focus,
		input[type=password]:focus,
		input[type=file]:focus {
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
	</style>
	<div align="center">
		<b>Enter the information of the new employee </b>
		<form action='' method="post" enctype="multipart/form-data" class="container">
			
			First Name:<input type='text' name='employee_first_name' /><br />
			Last Name:<input type='text' name='employee_last_name' /><br />
			Email:<input type='text' name='employee_email' /><br />
			Username:<input type='text' name='username' /><br />
			Password:<input type='password' name='password' /><br />
			Picture:<input type='file' name='image' /><br>
			<input type="submit" name="action" value="ADD EMPLOYEE" class='btn btn-primary'>
		</form>
	</div>

	
</body>
</html>