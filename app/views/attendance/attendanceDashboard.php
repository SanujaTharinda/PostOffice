<!DOCTYPE html>
<html>
<head>
	<title>SL POST OFFICE</title>

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<link rel="icon" type="image/png" href="#"/>
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/fontawesome-free/css/all.min.css"?>">
	<link rel="stylesheet" href="https://fonts.google.com/specimen/Roboto+Condensed?selection.family=Roboto+Condensed:300,300i,400,400i,700,700i">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" integrity="sha512-4e743y/yh7ffjixFn2DBKvAA0j02JNn0iQ/bIq6usesbp6TRPcZFW0XHnwfSnpTtsTmMGh0UmvbXY26aJfIb0Q==" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dutyArrangement.css"?>">
	<link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dashboard_style.css"?>">
	
</head>
<body class="overlay-scrollbar dashboard">

	<?php require_once APPROOT.'/views/navbar/navbar.php'; ?>
	
	 <div class="addDutyBar h">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="dashboardHeader">
                            <h5>Attendence Dashboard</h5>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo URLROOT; ?>AttendanceController/markAttendance"><button class="addDutyBtn">Mark Attendance</button></a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo URLROOT; ?>AttendanceController/showAttendance"><button class="addDutyBtn">View Attendance</button></a>
                    </div>
                </div>
            </div>
    </div> 

	<div class="wrapper">
		<div class="row">
			<div class="col-4 col-m-6 col-sm-6">
				<div class="counter bg-primary">
					<h3 id="todayemployee"></h3>
					<p><h2>Employees</h2></p>
				</div>
			</div>
			<div class="col-4 col-m-6 col-sm-6">
				<div class="counter bg-warning">
					<h3 id="todaypresent"></h3>
					<p><h2>Present</h2></p>
				</div>
			</div>
			<div class="col-4 col-m-6 col-sm-6">
				<div class="counter bg-success">
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
	<script src="https://kit.fontawesome.com/8fec142aee.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
	<script src="<?php echo PUBLICROOT."js/Chart.js"?>"></script>
	<script type="text/javascript" src="<?php echo PUBLICROOT."js/dashboard_script.js"?>"></script>
</body>
</html>