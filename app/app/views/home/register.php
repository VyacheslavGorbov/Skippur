<html>
<head><title>Registration</title>
</head>
<body>
	<div align="center">
		Enter your registration information below
		<form action='' method="post">
			<input type="radio" id="business" name="user_type" value="Site">
	  		<label for="business">Business</label>
	  		<input type="radio" id="customer" name="user_type" value="Customer">
	  		<label for="customer">Customer</label><br>
			Username:<input type='text' name='username' /><br />
			Password:<input type='password' name='password' /><br />
			Password Confirmation:<input type='password' name='password_confirmation' /><br />
			<input type="submit" name="action" value="Register">
		</form>
	</div>

	<a href='/Home/Login'>Login here</a>
</body>
</html>