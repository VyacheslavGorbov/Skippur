<html>
<head><title>Employee Login</title>
</head>
<body>
	<div align="center">
		
		<?php
			echo $data['errorMessage'];
		?>
		
	</br>

		Enter your login information below
		<form action='' method="post">
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
			<input type="submit" name="action" value="Login">
		</form>

		<a href='/Home/Register'>Register here</a><br>

	</div>
</body>
</html>