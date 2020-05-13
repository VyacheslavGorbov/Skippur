<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
		<div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php
							echo $data['calender'];
						 ?>

					</div>
				</div>

			</div>
		</div>
		<div>
		<center>
		<a class='btn btn-xs btn-primary' href='/site/makeCard'>VIEW EMPLOYEES</a>
		
	</center>
	</div>
	</body>
</html>
