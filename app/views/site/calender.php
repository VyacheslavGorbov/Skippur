<html>
	<head>
		<meta name="viewpoint" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<style>
			table{
				table-layout:fixed;
			}
			td{
				width:33%;
			}
			.today{
				background:yellow;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
						echo $data['calender'];
					 ?>

				</div>
			</div>

		</div>
		<center>
		<a class='btn btn-xs btn-primary' href='/Employee/add_employee'>ADD EMPLOYEE</a>
		<a class='btn btn-xs btn-primary' href='/Employee/add_employee'>REMOVE EMPLOYEE</a>
	</center>
	</body>
</html>
