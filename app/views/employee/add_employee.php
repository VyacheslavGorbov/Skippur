<html>
<head><title>ADD EMPLOYEE</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Exo+2&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
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
	<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="/home/index/">
            <img src="/images/skippur_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Skippur
        </a>
        <a href="/customer/profile">Profile</a>
        <a href="/customer/messages">Messages</a>
        <a href="/customer/myAppointments">My Appointments</a>
        <a href='/home/logout' class="topcorner">Logout</a>
    </nav>
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