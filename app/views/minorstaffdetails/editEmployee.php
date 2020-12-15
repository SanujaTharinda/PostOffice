<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EditEmployee</title>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css">
        <link href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
        <link href="https://clashfragrances.com/wp-content/themes/savoy/css/font-icons/pe-icon-7-filled/css/pe-icon-7-filled.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
        <link href="http://fechazo.com/js/dropdown/css/cs-skin-elastic.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

		<link rel="stylesheet" href="<?php echo URLROOT; ?>css/style.css">


</head>
<body class="edit-employee-body">

    <main>

        <form action="<?php echo URLROOT; ?>MinorStaffDetailsController/editEmployeeDetails" id="editEmployeeForm" method="post" class="userform" >

                    <div class="content-form pb-0">
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"><h2>Edit Employee Form<h2></div>
                                        <div class="card-body card-block">
                                        <form method="post">

                                            <div  id="hideField">
                                                <label for="">Name</label>
                                                <input id="edit0" type="text" class="form-control" value="" name="id">
                                            </div>

                                            <div class="form-group">
												<label class=" form-control-label">Name</label>
												<input id="edit1" type="text" class="form-control" value=""  name="full_name">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">NIC</label>
												<input id="edit2" type="text" class="form-control" value="" name="nic">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Address</label>
												<input id="edit3" type="text" class="form-control" value="" name="address">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Telephone Number</label>
												<input id="edit4" type="text" class="form-control" value="" name="telephone">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Gender</label>
												<input id="edit5" type="text" class="form-control" value="" name="gender">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">First Day</label>
												<input id="edit6" type="text" class="form-control" value="" name="first_day">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Registered day</label>
												<input id="edit7" type="text" class="form-control" value="" name="registered_day">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Permenent day</label>
												<input id="edit8" type="text" class="form-control" value="" name="permenent_day">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Carrier</label>
												<input  id="edit9" type="text" class="form-control" value="" name="carrier">
											</div>


                                            <label class=" form-control-label"><b>If only replacement job</b></label>

                                            <div class="form-group">
                                                <div class="form-label">
												    <label class=" form-control-label">Register or not</label>
                                                    <input id="edit10"type="text" class="form-control" value="" name="reg">
												</div>
											</div>

											<div class="form-group">
												<label class=" form-control-label">User</label>
                                                <input id="edit11"type="text" class="form-control" value="" name="user">
											</div>
											
                                            <button  type="submit" name="submit" id="editSubmitButton" class="btn btn-lg btn-info btn-block">
                                                <span id="payment-button-amount">Submit</span>
                                            </button>


                                        </form>
									    </div>
								        </div>
							    </div>
						    </div>
						</div>
					</div>
					
					
		</form>
			
		<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	  	<script src="<?php echo URLROOT; ?>public/js/minorStaff.js"></script>
    
</body>
</html>