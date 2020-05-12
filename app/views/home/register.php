<html>

<head>
	<title>Registration</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
	</style>
</head>

<body>
	<div align="center">
		Enter your registration information below
		<form action='' method="post" class='container'>
			<input type="radio" id="business" name="user_type" value="Site">
			<label for="business">Business</label>
			<input type="radio" id="customer" name="user_type" value="Customer">
			<label for="customer">Customer</label><br>
			Username:<input type='text' name='username' /><br />
			Password:<input type='password' name='password' /><br />
			Password Confirmation:<input type='password' name='password_confirmation' /><br />
			<input type="submit" name="action" value="Register" class='btn btn-primary'>
			<br><br>
			Already have an account? <a href='/Home/Login'>Login here</a>
			<br>
			<a href='/'>Back to homepage</a>
		</form>
	</div>


</body>

</html>