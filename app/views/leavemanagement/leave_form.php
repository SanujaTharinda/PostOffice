<!DOCTYPE html>
<html>
<head>
	<title>Add Leave</title>

	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha512-Yu3tDzlofwBycOX5qb6K4tGJKGD72LA/9ckyioo8plGOdLwIeESQgo+KY4M+gvBJvDguqYeweLVTIn+S/9ZC/Q==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dutyArrangement.css"?>">
      
</head>
<body class="leave_form_body">	
	<div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Leave</strong></div>
                        <div class="card-body card-block">
                           <form method="post" action="<?php echo URLROOT."LeaveManagementController/submitLeave"?>">
						   		<div class="form-group">
									<label class=" form-control-label">Name</label>
									<input type="text" name="name" class="form-control" placeholder="Enter Name" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Employee Type</label>
									<select name="employee_type" required class="form-control">
										<option value="">Select Employee Type</option>
										<option value="1">minor staff</option>
										<option value="2">employee user</option>
										<option value="3">main user</option>
									</select>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Leave Type</label>
									<select name="leave_type" required class="form-control">
										<option value="">Select Leave</option>
										<option value="1">sick</option>
									</select>
								</div>
							   <div class="form-group">
									<label class=" form-control-label">From Date</label>
									<input type="date" name="leave_from"  class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">To Date</label>
									<input type="date" name="leave_to" class="form-control" required>
								</div>
								<div class="form-group">
									<label class=" form-control-label">Leave Description</label>
									<input type="text" name="leave_description" class="form-control" placeholder="Enter Leave Description" required >
								</div>
								
								 <button  type="submit" name="submit" class="btn btn-lg btn-info btn-block">
							   <span id="payment-button-amount">Submit</span>
							   </button>
							  </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
</body>
</html>