<html>
<head><title>Business Owner Registration</title>
</head>
<body>
	<div align="center">
		Enter your registration information below
		<form action='' method="post">
			Business Name:<input type='text' name='business_name' /><br />
			Site Name:<input type='text' name='site_name' /><br />
			Site Address:<input type='text' name='site_address' /><br />
			Site Postal Code:<input type='text' name='site_postal_code' /><br />
			Site Phone Number:<input type='text' name='site_phone_number' /><br />
			Site Email:<input type='text' name='site_email' /><br />
			<label for="business_domain">Business Domain:</label>

				<select id="business_domain" name="business_domain">
				  <option value="hair_salon">Beauty Salon</option>
				  <option value="auto_mechanic">Auto Mechanic</option>
				  <option value="spa">Spa</option>
				  <option value="dentist">Dentist</option>
				  <option value="lawyer">Lawyer</option>
				</select>
			</br>
			<input type="submit" name="action" value="Register">
		</form>
	</div>

	
</body>
</html>