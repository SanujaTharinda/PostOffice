
<!DOCTYPE html>
<html>
<head>
	<title></title>

		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/normalize.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/themify-icons.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/pe-icon-7-filled.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/flag-icon.min.css">
		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/form/cs-skin-elastic.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?php echo PUBLICROOT;?>css/dutyArrangement.css">


</head>
<body class="add-employee-body">

	<main>

		<form action="<?php echo URLROOT;?>/DutyArrangementController/editDutyPage/<?php echo $data['id'];?>" method="post" class="userform" id="form"  >

					<div class="content-form pb-0">
						<div class="animated fadeIn">
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header"><h2>Edit Duty<h2></div>
									<div class="card-body card-block">
									<form method="post">

                                            <input type="hidden" name="id" value="<?php echo $id?>">
										
											<div class="form-group">
												<label class=" form-control-label">Name</label>
												<input type="text"  name="name" placeholder="Enter name" class="form-control" value="<?php echo $data['name'];?>" required>
											</div>
											<div class="form-group">
												<label class=" form-control-label">Start time</label>
												<input type="text"  name="start_time" placeholder="HH:mm" class="form-control" value="<?php echo $data['start_time'];?>" required>
											</div>
											<div class="form-group">
												<label class=" form-control-label">End time</label>
												<input type="text"  name="end_time" placeholder="HH:mm" class="form-control" value="<?php echo $data['end_time'];?>" required>
											</div>
											
											<div class="form-group">
												<label class=" form-control-label">Duty</label>
												<input type="text"  name="duty" placeholder="Enter duty" class="form-control" value="<?php echo $data['duty'];?>" required>
											</div>
											
                                            <button  type="submit" name="update" class="btn btn-lg btn-info btn-block">Update</button>
                                            
										</form>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					
					<div class="row">          
						<div class="col">
							<a href="<?php echo URLROOT;?>DutyArrangementController/dutyArrangement"><button class="backBtn">Back</button></a>
						</div>
					</div>
					
			</form>
			
		

    </main>
    
<script src="<?php echo PUBLICROOT;?>js/duty.js"></script>
<script src="<?php echo PUBLICROOT;?>js/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>


</body>
</html>

