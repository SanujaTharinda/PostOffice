<!DOCTYPE html>
<html>
<head>
	<title>Leave Type</title>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css" integrity="sha512-Yu3tDzlofwBycOX5qb6K4tGJKGD72LA/9ckyioo8plGOdLwIeESQgo+KY4M+gvBJvDguqYeweLVTIn+S/9ZC/Q==" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" type="text/css" href="<?php echo PUBLICROOT."css/dutyArrangement.css"?>">
 


</head>
<body>
	<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Leave Type Manage </h4>
						         <h4 class="box_title_link"><a href="<?php echo(ADD_LEAVE_TYPE_CLICK);?>">Add Leave Type</a> </h4>
                           <h4 class="box_title_link"><a href="<?php echo(LEAVE_MANAGEMENT_CLICK_ADMIN);?>">Leave Approve Dashboard</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">ID</th>
                                       <th width="75%">Leave Type</th>
                                       <th width="10%"></th>
                                       <th width="10%"></th>
                                    </tr>
                                 </thead>
                                 <tbody id="leave_type_tbody">
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
      <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="<?php echo PUBLICROOT; ?>js/leave_type.js"></script>


</body>
</html>