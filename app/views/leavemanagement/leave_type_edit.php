<!DOCTYPE html>
<html>
<head>
	<title>Edit Leave Type</title>

	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha512-Yu3tDzlofwBycOX5qb6K4tGJKGD72LA/9ckyioo8plGOdLwIeESQgo+KY4M+gvBJvDguqYeweLVTIn+S/9ZC/Q==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dutyArrangement.css"?>">
      
</head>
<body class="leave_form_body">

   <form method="post" class="userform" id="form">
         <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Add Leave Type</strong></div>
                        <div class="card-body card-block">
                           <form method='POST' action="<?php echo URLROOT;?>/LeaveManagementController/editLeavePage/<?php echo $data['id'];?>" >
                           
                              <input type="hidden" name="id" value="<?php echo $data["id"]?>">
      							   <div class="form-group">
      								 <label for="leave_type" class=" form-control-label">Leave Type</label>
      								 <input type="text" name="leave_type" value="<?php echo $data['leave_type'];?>" class="form-control" required>
                              </div>			   
      							   <button  type="submit" name="update" class="btn btn-lg btn-info btn-block">Update</button>
      							</form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </form>
</body>
</html>