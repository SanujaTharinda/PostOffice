<!DOCTYPE html>
<html>
<head>
	<title>SL POST OFFICE</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="#"/>
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/fontawesome-free/css/all.min.css"?>">
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dashboard_style.css"?>">
</head>
<body class="overlay-scrollbar">
	
	<div class="navbar">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link">
					<i class="fas fa-bars" onclick="collapseSidebar()"></i>
				</a>
			</li>
			<li class="nav-item">
				<h2>DASHBOARD</h2>
				
			</li>
		</ul>
	</div>

	<div class="sidebar">
		<ul class="sidebar-nav">
			<li class="sidebar-nav-item">
				<a href="<?php echo URLROOT; ?>AttendanceController/markAttendance" class="sidebar-nav-link">
					<div>
						<i class="fas fa-tachometer-alt"></i>
					</div>
					<span>
						mark attendance
					</span>
				</a>
			</li>
			<li class="sidebar-nav-item">
				<a href="<?php echo URLROOT; ?>AttendanceController/showAttendance" class="sidebar-nav-link">
					<div>
						<i class="fab fa-accusoft"></i>
					</div>
					<span>
						view attendance
					</span>
				</a>
			</li>
			
		</ul>
	</div>

	<div class="wrapper">
		<div class="row">
			<div class="col-4 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<p>
						<i class="fas fa-tasks"></i>
					</p>
					<h3 id="todayemployee"></h3>
					<p><h2>Employees</h2></p>
				</div>
			</div>
			<div class="col-4 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<p>
						<i class="fas fa-spinner"></i>
					</p>
					<h3 id="todaypresent"></h3>
					<p><h2>Present</h2></p>
				</div>
			</div>
			<div class="col-4 col-m-6 col-sm-6">
				<div class="counter bg-success">
					<p>
						<i class="fas fa-check-circle"></i>
					</p>
					<h3 id="todayabsent"></h3>
					<p><h2>Absent</h2></p>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 col-m-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h2>
							Chart Analysis
						</h2>
					</div>
					
					<div class="row">
						<div class="col-4 col-m-6 col-sm-6">
							<div class="counter bg-red con"  >
								
								<canvas  id="mycanvas_1" width="250px" height="250px"  ></canvas>
								<p>Attendence-Today</p>
							</div>
						</div>
						<div class="col-4 col-m-6 col-sm-6">
							<div class="counter bg-primary con">
								
								<canvas  id="mycanvas_2" width="250px" height="250px"></canvas>
								<p>Attendence-Previousday</p>
							</div>
						</div>
						<div class="col-4 col-m-6 col-sm-6">
							<div class="counter bg-primary con">
								
								<canvas  id="mycanvas_3" width="250px" height="250px"></canvas>
								<p>Attendence-Last Week</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo PUBLICROOT."js/dashboard_index.js"?>"></script>

	<script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
	<?php echo PUBLICROOT."js/jquery-2.1.4.min.js" ?>
	<script src="<?php echo PUBLICROOT."js/Chart.js"?>"></script>
	<script type="text/javascript" src="<?php echo PUBLICROOT."js/dashboard_script.js"?>"></script>
</body>
</html>