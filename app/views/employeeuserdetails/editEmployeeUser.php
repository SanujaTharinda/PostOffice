<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

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

        <form action="<?php echo URLROOT; ?>EmployeeUserDetailsController/editEmployeeUserDetails" id="editEmployeeUserForm" method="post" class="userform" >

                    <div class="content-form pb-0">
                        <div class="animated fadeIn">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header"><h2>Edit Employee USer Form<h2></div>
                                        <div class="card-body card-block">
                                        <form method="post">

                                            <div  id="hideField">
                                                <label for="">Name</label>
                                                <input id="edit0" type="text" class="form-control" value="" name="id">
                                            </div>

                                            <div class="form-group">
												<label class=" form-control-label">Email</label>
												<input id="edit1" type="text" class="form-control" value=""  name="email">
											</div>

                                            <div class="form-group">
												<label class=" form-control-label">Username</label>
												<input id="edit2" type="text" class="form-control" value="" name="username">
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
	  	<script src="<?php echo URLROOT; ?>public/js/employeeUser.js"></script>
    
</body>
</html>