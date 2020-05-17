<html>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head><title>Employee Login</title>
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
	</style>
	<div align="center">
		
		<?php if (strlen($data['errorMessage'])  > 1){
			$message = $data['errorMessage'];
		 	echo  "<center><div class='alert alert-danger' role='alert'> $message </div><center>"; 
		 }
		?>
		
	</br>

		Enter your login information below
		<form action='' method="post" class="container">
			<select name='Site'>
        	<option selected="selected">CHOOSE YOUR EMPLOYER</option>
        	<?php
        
        		foreach($data['sites'] as $site){
        	?>
        	<option value="<?php echo $site->site_name; ?>"><?php echo $site->site_name; ?></option>
        		<?php
        	}
        	?>
   			</select></br>
			Username:<input type='text' name='username' /><br />
			Password:<input type='password' name='password' /><br />
			<input type="submit" name="action" value="Login" class='btn btn-primary'>
		</form>

		
		<a href='/'>Back to homepage</a>

	</div>
</body>
</html>