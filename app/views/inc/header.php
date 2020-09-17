<!DOCTYPE html>
<html>
<head>
	<title><?php echo SITENAME; ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.
	0/css/bootstrap.min.css"
	integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
	crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.
	0/css/font-awesome.min.css" rel="stylesheet"
	integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
	 crossorigin="anonymous">
</head>
<body>
	<div class="menu">
	<ul>
		<li><i class="fa fa-bars" aria-hidden="true"></i></i>Menu
			<div class="submenu">
				<ul>
					<li><i class="fa fa-plus" aria-hidden="true"></i><a href="<?php echo URLROOT; ?>employees/addEmployee">Add Employee</a></li>
					<!--<li><i class="fa fa-pencil" aria-hidden="true"></i><a href="edit_employee.php">Edit User</a></li>
					<li><i class="fa fa-minus" aria-hidden="true"></i><a href="<?php echo URLROOT; ?>employees/removeEmployee">Remove User</a></li>-->
					<li><i class="fa fa-user" aria-hidden="true"></i><a href="<?php echo URLROOT; ?>employees/searchEmployee">Search employee</a></li>
				</ul>
			</div>	
		</li>


		<li><i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
			<div class="submenu">
				<ul>
					<li><i class="fa fa-user" aria-hidden="true"></i><a href="#">Profile</a></li>
					<li><i class="fa fa-sign-out" aria-hidden="true"></i><a href="<?php echo URLROOT; ?>users/logout">Logout</a></li>
				</ul>
		</li>
	</ul>
	</div>


</body>
</html>
